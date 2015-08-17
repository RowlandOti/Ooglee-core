<?php Ooglee\Application\Entities;

use Ooglee\Domain\Entities\ABaseRepository;
use Ooglee\Application\Entities\ABaseService;
use Ooglee\Domain\Contracts\IBaseService;
use Helpers\Response\MyResponse;

//Each service class would extend a ABaseService class which 
//implements the following interface:

abstract class  ABaseService implements IBaseService {

    protected $repository;

    public function __construct(ABaseRepository $repository)
    {
      $this->repository = $repository;
    }

    public function getAll() 
    {
      $response = $this->repository->getAll();

      return $response;
    }
    public function getBy($id) 
    {
      // If entity variable is numeric, assume ID
        if (is_numeric($id))
        {
            // Get Eloquent model based on ID
            $modelClassInstance = $this->repository->findById($id);
        }
        else 
        {
            // Since not numeric, lets try get the Eloquent model based on Name
            $modelClassInstance = $this->repository->findBySlug($id);
        }
        
        // If Eloquent model returned (rather than null) return the name of the model
        if ($modelClassInstance != null)
        {
            $response = $modelClassInstance->name;

            return $response;
        }

            $status = 404;

            $data = array(
                'status'  => $status,
                'success' => false,
                'message' => 'Event not found'
                );

            $response = MyResponse::json($data, $status);
            

            return $response;

    } 
}