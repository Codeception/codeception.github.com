## Dependencies

* specify module dependencies explicitly (BC break)

```
modules:
    enabled: 
        REST:
            depends: PhpBrowser
```

```
modules:
    enabled:
        - Symfony2
        - Doctrine2:
            depends: Symfony2
```
