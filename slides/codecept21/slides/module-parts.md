##  Module Parts

* module can be loaded partially into tester class
* use only specific actions of module

```
modules:
    enabled: 
        # load only *Record actions
        - Laravel4:
            part: ORM
        # do not load actions for XML assertions
        - REST:
           part: Json
```

```
modules:
    enabled: 
        # do not load JSON actions
        - REST:        
            part: Xml
```