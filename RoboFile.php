<?php
use Symfony\Component\Finder\Finder;

class RoboFile extends \Robo\Tasks
{
 
 	function post()
 	{
 		$title = $this->ask("Post title");
 		$file = strtolower(str_replace([' ',':'], ['-','-'], $title));
 		$date = date('Y-m-d');
 		$this->taskWriteToFile("_posts/$date-$file.markdown")
 			->line('---')
 			->line('layout: post')
 			->line("title: \"$title\"")
 			->line("date: $date 01:03:50")
 			->line("---\n")
 			->run();
 	}

 	function publish()
 	{
 		$this->taskGitStack()
 			->add('-A')
 			->commit('updated')
 			->pull()
 			->push()
 			->run();
 	}


  /**
   * builds docs for specific branch
   */
  function docsBranch($branch)
  {
    $this->yell("Creating docs for $branch");
    $dir = "docs-$branch";

    $this->taskGitStack()
      ->cloneRepo('git@github.com:Codeception/Codeception.git', 'source')
      ->run();

    $this->taskGitStack()
      ->dir('source')
      ->checkout($branch)
      ->run();

    $this->taskCleanDir($dir)->run();

    $this->taskWriteToFile("_includes/doc_$branch.html")      
        ->text('<div class="alert alert-danger">')
        ->text('You are viewing documentation for Codeception <strong>'.$branch.'</strong>. ')
        ->text('Switch to <a href="/docs">latest stable &raquo;</a>')
        ->text('</div>')
        ->run();


      $indexFile = $this->taskWriteToFile($dir . '/index.md')
        ->line('---')
        ->line('layout: doc')
        ->line("title: Codeception $branch Documentation")
        ->line('---')
        ->text("\n\n{% include doc_$branch.html %}\n\n\n")
        ->line("# Codeception $branch Guides\n\n");

    $guides = Finder::create()
        ->ignoreVCS(true)
        ->depth('== 0')
        ->name('*.md')
        ->sortByName()
        ->in('source/docs');


    foreach ($guides as $file) {
      $contents = file_get_contents($file->getRealPath());
      $name = substr($file->getBasename(),0,-3);
      $title = preg_replace("(\d+-)", '', $name);
      if (preg_match('/^# (.*)$/m', $contents, $matches)) {
        $title = $matches[1];
      }
      $indexFile->line("* [$title](/$dir/$name)");

      $this->taskWriteToFile($dir . '/' . $file->getBasename())
        ->line('---')
        ->line('layout: doc')
        ->line('title: Codeception Documentation')
        ->line('---')
        ->line('')
        ->line('')
        ->text("{% include doc_$branch.html %}")
        ->line('')
        ->line('')
        ->text($contents)
        ->run();
    }
    $indexFile->run();
    // $this->taskDeleteDir('source')->run();
  }
}