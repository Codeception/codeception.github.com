## Shell auto-completion

For bash and zsh shells, you can use auto-completion for your Codeception projects by executing the following in your shell (or add it to your .bashrc/.zshrc):

```
# BASH ~4.x, ZSH
source <([codecept location] _completion --generate-hook --program codecept --use-vendor-bin)
# BASH ~3.x, ZSH
[codecept location] _completion --generate-hook --program codecept --use-vendor-bin | source /dev/stdin

# BASH (any version)
eval $([codecept location] _completion --generate-hook --program codecept --use-vendor-bin)

```

By using the above code in your shell, Codeception will try to autocomplete the following:

* Commands
* Suites
* Test paths

Usage of `-use-vendor-bin` is optional. This option will work for most Codeception projects, where Codeception is located in your `vendor/bin` folder.
But in case you are using a global Codeception installation for example, you wouldn't use this option.

Note that with the `-use-vendor-bin` option, your commands will be completed using the Codeception binary located in your project's root.
Without the option, it will use whatever Codeception binary you originally used to generate the completion script ('codecept location' in the above examples)
