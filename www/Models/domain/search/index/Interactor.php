<?php

namespace domain\search\index;

use domain\components\searchBox\Interactor as SearchBoxInteractor;
use domain\Exception\ValidationFailException;

class Interactor
{

    /**
     * @return array
     * please refer to Presenter
     */
    public function interact()
    {
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('/var/www/Models/diconfig.php');
        $container = $builder->build();

        try {
            $searchBoxData = $container->get(SearchBoxInteractor::class)->interact();
        }
        catch (ValidationFailException $e) {
            return (new Presenter)->reportValidationFailure($e->getMessage());
        }

        return (new Presenter)->present($searchBoxData);
        
    }
}
