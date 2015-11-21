<?php
namespace TIL\Controllers;

use \Silex\Application;
use \Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PostControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
       // creates a new controller based on the default route
        $posts = $app['controllers_factory'];

        $posts->get('/{id}/show', function (Request $request) use($app){
            
            $repository = $app['post_repository'];
            $id = $request->get('id');
            if ($result = $repository->find($id))
            {
                return new Response($app->json($result,200));
            }
            else{
                return new Response($app->json(['error' => 'something went wrong'],500));
            }
           
        });
        
        $posts->get('/', function () use($app) {
        
            $repository = $app['post_repository'];
            if ($results = $repository->findAll())
            {
                return new Response($app->json($results,200));
            }
            else{
                return new Response($app->json(['error' => 'something went wrong'],500));
            }
        });
        
        $posts->post('/new', function (Request $request) use ($app) {
            $repository = $app['post_repository'];
            $newPost = array(
                'post' => $request->get('post'),
                'username' => 'Admin'
                );
                //This repository call uses an array, the repository should deal with simplae array data and deal with the model. The controller should not have a new Post() in the methods.
              if($repository->save($newPost))
              {
                  return new Response($app->json(array('result' => 'created'),201));
              }
              else{
                 return new Response($app->json(array('result' => 'boom!'),500));
              };
        });

        return $posts; 
    }
}