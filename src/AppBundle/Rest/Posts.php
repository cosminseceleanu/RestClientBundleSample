<?php

namespace AppBundle\Rest;


use Cos\RestClientBundle\Annotation\Client;
use Cos\RestClientBundle\Annotation\Endpoint;
use Cos\RestClientBundle\Annotation\Form;
use Cos\RestClientBundle\Annotation\Json;
use Cos\RestClientBundle\Annotation\Path;
use Cos\RestClientBundle\Annotation\Query;

/**
 * @Client(name="default")
 */
interface Posts
{
    /**
     * @Path(name="id", paramName="idParam")
     * @Endpoint(uri="/posts/{id}", method="get")
     */
    public function get($idParam);

    /**
     * @Query(name="userId")
     * @Endpoint(uri="/posts")
     */
    public function getWithQuery($userId);

    /**
     * @Form(name="formData")
     * @Endpoint(uri="/posts", method="POST")
     */
    public function form(array $formData);

    /**
     * @Json(name="data")
     * @Endpoint(uri="/posts", method="POST")
     */
    public function json(array $data);
}