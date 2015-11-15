<?php

require_once("../vendor/autoload.php");
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app["debug"] = true;
$app->get("/hello/{name}", function(Request $request){

	$name = $request->get("name");
        return "<p>Hello ".$name."</p>";
});

$app->get("/", function() use ($app){
      $data =[
["name"=>"user1","post" => "This is a sample post", "post_id" =>1],
["name"=>"user2","post" => "This is also a sample post", "post_id" =>2],
["name"=>"user1","post" => "This is yet another sample post", "post_id" =>3]
] ;
         return $app->json($data,200);
});

$app->get("/show/{id}/", function($id) use ($app){
    if(in_array($id,[1,2,3])) {$data = ["name"=>"user1","post" => "This is a sample post", "post_id" =>$id];}
 if(!$data){
 $error = ["error"=>"We cahn fine dat post mon."];
return $app->json($error,404);
}
   return $app->json($data);
});

$app->post("/new",function(Request $request) use ($app){
$post = new stdClass();
$post->name = $request.get("name");
$post->user = $request.get("user");
$post->created = time();
//pretend we insert  the record into the db
//$post->save();
return new Response("Thank you for your contribution!",201);
});

$app->post("/edit/{id}",function(Request $request,$id) use ($app){
$post = new stdClass();
$post->name = $request.get("name");
$post->user = $request.get("user");
$post->updated_at = time();
//pretend we replace the record in the db
//$post->save($id);
return new Response("Thank you for your revision!",201);
});

$app->delete("/{$id}", function($id){
$post = stdClass();
//pretend we delete the record from the db
//$post->delete($id);
return new Response("Thank you for your revision!",201);
});
$app->run();
?>