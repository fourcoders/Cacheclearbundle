cacheclearbundle
================

This bundle give you a correct clean cache in your symfony 2 proyect. Only for unix systems. 

Add in your composer.json

    {
        "require": {
            "fourcoders/cacheclear-bundle": "dev-master"
        }
    }

Add in your app/AppKernel.php

    <?php

      // app/AppKernel.php
      public function registerBundles()
      {
        return array(
          // ...
          new Fourcoders\Bundle\CacheclearBundle\FourcodersCacheclearBundle(),
          // ...
          );
      }
