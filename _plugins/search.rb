class AlgoliaSearchJekyllPush < Jekyll::Command
  class << self
    # Hook to exclude some files from indexing
    def custom_hook_excluded_file?(file)
      return true if file.path =~ %r{^/_site/}
      return true if file.path =~ %r{^/_docs-1.8/}
      return true if file.path =~ %r{^/_docs-2.0/}
      return true if file.path =~ %r{^/_slides/}
      return true if file.basename =~ %r{^2012-}
      return true if file.basename =~ %r{^2013-}
      return true if file.basename =~ %r{^2014-}
      false
    end
  end
end