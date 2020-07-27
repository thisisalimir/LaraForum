<?php

namespace Tests;


use App\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Class TestCase
 * @package Tests
 */
abstract class TestCase extends BaseTestCase {
    use CreatesApplication;

//    /**
//     *
//     */
//    protected function setUp(): void {
//        parent::setUp();
//
//        $this->disableExceptionHandling();
//    }

    /**
     * @param null $user
     * @return $this
     */
    protected function signIn($user = null) {
        $user = $user ?: create('App\User');

        $this->actingAs($user);

        return $this;
    }

//
//    /**
//     * @throws \Illuminate\Contracts\Container\BindingResolutionException
//     */
//    protected function disableExceptionHandling() {
//        $this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);
//
//        $this->app->instance(ExceptionHandler::class, new class extends Handler {
//            public function __construct() {
//            }
//
//            public function report(\Exception $e) {
//            }
//
//            public function render($request, \Exception $e) {
//                throw $e;
//            }
//        });
//    }
//
//    /**
//     * @return $this|BaseTestCase
//     */
//    protected function withExceptionHandling() {
//        $this->app->instance(ExceptionHandler::class, $this->oldExceptionHandler);
//
//        return $this;
//    }
}
