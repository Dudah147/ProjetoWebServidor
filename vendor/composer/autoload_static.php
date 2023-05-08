<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit42e0b5bc2006fd159cc09a88e9c55ef4
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Pecee\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Pecee\\' => 
        array (
            0 => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee',
        ),
    );

    public static $classMap = array (
        'BootManagerTest' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/BootManagerTest.php',
        'ClassLoaderTest' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/ClassLoaderTest.php',
        'ComposerAutoloaderInit42e0b5bc2006fd159cc09a88e9c55ef4' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit42e0b5bc2006fd159cc09a88e9c55ef4' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'ConexaoBanco' => __DIR__ . '/../..' . '/models/ConexaoBanco.php',
        'CsrfVerifierTest' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/CsrfVerifierTest.php',
        'CustomClassLoader' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/Dummy/ClassLoader/CustomClassLoader.php',
        'CustomMiddlewareTest' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/CustomMiddlewareTest.php',
        'DummyController' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/Dummy/DummyController.php',
        'DummyCsrfVerifier' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/Dummy/CsrfVerifier/DummyCsrfVerifier.php',
        'DummyLoadableRoute' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/Dummy/Route/DummyLoadableRoute.php',
        'DummyMiddleware' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/Dummy/DummyMiddleware.php',
        'EventHandlerTest' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/EventHandlerTest.php',
        'ExceptionHandler' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/Dummy/Handler/ExceptionHandler.php',
        'ExceptionHandlerException' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/Dummy/Exception/ExceptionHandlerException.php',
        'ExceptionHandlerFirst' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/Dummy/Handler/ExceptionHandlerFirst.php',
        'ExceptionHandlerSecond' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/Dummy/Handler/ExceptionHandlerSecond.php',
        'ExceptionHandlerThird' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/Dummy/Handler/ExceptionHandlerThird.php',
        'FindUrlBootManager' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/Dummy/Managers/FindUrlBootManager.php',
        'GetController' => __DIR__ . '/../..' . '/controllers/get.controller.php',
        'InputHandlerTest' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/InputHandlerTest.php',
        'IpRestrictMiddleware' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/Dummy/Middleware/IpRestrictMiddleware.php',
        'LoadableRouteTest' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/LoadableRouteTest.php',
        'MiddlewareLoadedException' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/Dummy/Exception/MiddlewareLoadedException.php',
        'MiddlewareTest' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/MiddlewareTest.php',
        'MyNamespace\\NSController' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/Dummy/NSController.php',
        'Pecee\\Controllers\\IResourceController' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/Controllers/IResourceController.php',
        'Pecee\\Exceptions\\InvalidArgumentException' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/Exceptions/InvalidArgumentException.php',
        'Pecee\\Http\\Exceptions\\MalformedUrlException' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/Http/Exceptions/MalformedUrlException.php',
        'Pecee\\Http\\Input\\IInputItem' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/Http/Input/IInputItem.php',
        'Pecee\\Http\\Input\\InputFile' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/Http/Input/InputFile.php',
        'Pecee\\Http\\Input\\InputHandler' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/Http/Input/InputHandler.php',
        'Pecee\\Http\\Input\\InputItem' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/Http/Input/InputItem.php',
        'Pecee\\Http\\Middleware\\BaseCsrfVerifier' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/Http/Middleware/BaseCsrfVerifier.php',
        'Pecee\\Http\\Middleware\\Exceptions\\TokenMismatchException' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/Http/Middleware/Exceptions/TokenMismatchException.php',
        'Pecee\\Http\\Middleware\\IMiddleware' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/Http/Middleware/IMiddleware.php',
        'Pecee\\Http\\Middleware\\IpRestrictAccess' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/Http/Middleware/IpRestrictAccess.php',
        'Pecee\\Http\\Request' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/Http/Request.php',
        'Pecee\\Http\\Response' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/Http/Response.php',
        'Pecee\\Http\\Security\\CookieTokenProvider' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/Http/Security/CookieTokenProvider.php',
        'Pecee\\Http\\Security\\Exceptions\\SecurityException' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/Http/Security/Exceptions/SecurityException.php',
        'Pecee\\Http\\Security\\ITokenProvider' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/Http/Security/ITokenProvider.php',
        'Pecee\\Http\\Url' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/Http/Url.php',
        'Pecee\\SimpleRouter\\ClassLoader\\ClassLoader' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/ClassLoader/ClassLoader.php',
        'Pecee\\SimpleRouter\\ClassLoader\\IClassLoader' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/ClassLoader/IClassLoader.php',
        'Pecee\\SimpleRouter\\Event\\EventArgument' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Event/EventArgument.php',
        'Pecee\\SimpleRouter\\Event\\IEventArgument' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Event/IEventArgument.php',
        'Pecee\\SimpleRouter\\Exceptions\\ClassNotFoundHttpException' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Exceptions/ClassNotFoundHttpException.php',
        'Pecee\\SimpleRouter\\Exceptions\\HttpException' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Exceptions/HttpException.php',
        'Pecee\\SimpleRouter\\Exceptions\\NotFoundHttpException' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Exceptions/NotFoundHttpException.php',
        'Pecee\\SimpleRouter\\Handlers\\CallbackExceptionHandler' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Handlers/CallbackExceptionHandler.php',
        'Pecee\\SimpleRouter\\Handlers\\DebugEventHandler' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Handlers/DebugEventHandler.php',
        'Pecee\\SimpleRouter\\Handlers\\EventHandler' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Handlers/EventHandler.php',
        'Pecee\\SimpleRouter\\Handlers\\IEventHandler' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Handlers/IEventHandler.php',
        'Pecee\\SimpleRouter\\Handlers\\IExceptionHandler' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Handlers/IExceptionHandler.php',
        'Pecee\\SimpleRouter\\IRouterBootManager' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/IRouterBootManager.php',
        'Pecee\\SimpleRouter\\Route\\IControllerRoute' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Route/IControllerRoute.php',
        'Pecee\\SimpleRouter\\Route\\IGroupRoute' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Route/IGroupRoute.php',
        'Pecee\\SimpleRouter\\Route\\ILoadableRoute' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Route/ILoadableRoute.php',
        'Pecee\\SimpleRouter\\Route\\IPartialGroupRoute' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Route/IPartialGroupRoute.php',
        'Pecee\\SimpleRouter\\Route\\IRoute' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Route/IRoute.php',
        'Pecee\\SimpleRouter\\Route\\LoadableRoute' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Route/LoadableRoute.php',
        'Pecee\\SimpleRouter\\Route\\Route' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Route/Route.php',
        'Pecee\\SimpleRouter\\Route\\RouteController' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Route/RouteController.php',
        'Pecee\\SimpleRouter\\Route\\RouteGroup' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Route/RouteGroup.php',
        'Pecee\\SimpleRouter\\Route\\RoutePartialGroup' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Route/RoutePartialGroup.php',
        'Pecee\\SimpleRouter\\Route\\RouteResource' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Route/RouteResource.php',
        'Pecee\\SimpleRouter\\Route\\RouteUrl' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Route/RouteUrl.php',
        'Pecee\\SimpleRouter\\Router' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/Router.php',
        'Pecee\\SimpleRouter\\SimpleRouter' => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee/SimpleRouter/SimpleRouter.php',
        'PostController' => __DIR__ . '/../..' . '/controllers/post.controller.php',
        'RequestTest' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/RequestTest.php',
        'ResourceController' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/Dummy/ResourceController.php',
        'ResponseException' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/Dummy/Exception/ResponseException.php',
        'RewriteMiddleware' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/Dummy/Middleware/RewriteMiddleware.php',
        'RouterCallbackExceptionHandlerTest' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/RouterCallbackExceptionHandlerTest.php',
        'RouterControllerTest' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/RouterControllerTest.php',
        'RouterGroupTest' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/RouterGroupTest.php',
        'RouterPartialGroupTest' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/RouterPartialGroupTest.php',
        'RouterResourceTest' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/RouterResourceTest.php',
        'RouterRewriteTest' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/RouterRewriteTest.php',
        'RouterRouteTest' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/RouterRouteTest.php',
        'RouterUrlTest' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/RouterUrlTest.php',
        'SilentTokenProvider' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/Dummy/Security/SilentTokenProvider.php',
        'TestBootManager' => __DIR__ . '/..' . '/pecee/simple-router/tests/Pecee/SimpleRouter/Dummy/Managers/TestBootManager.php',
        'TestRouter' => __DIR__ . '/..' . '/pecee/simple-router/tests/TestRouter.php',
        'Usuario' => __DIR__ . '/../..' . '/models/usuarios.model.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit42e0b5bc2006fd159cc09a88e9c55ef4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit42e0b5bc2006fd159cc09a88e9c55ef4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit42e0b5bc2006fd159cc09a88e9c55ef4::$classMap;

        }, null, ClassLoader::class);
    }
}
