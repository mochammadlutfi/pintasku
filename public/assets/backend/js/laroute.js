(function () {

    var laroute = (function () {

        var routes = {

            absolute: true,
            rootUrl: 'https://pintasku2.dev',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":"home","action":"App\Http\Controllers\HomeController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"about-us","name":"about","action":"App\Http\Controllers\HomeController@about"},{"host":null,"methods":["GET","HEAD"],"uri":"products","name":"product","action":"App\Http\Controllers\ProductController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"contact","name":"contact","action":"App\Http\Controllers\HomeController@contact"},{"host":null,"methods":["GET","HEAD"],"uri":"services\/web-development","name":"service.web","action":"App\Http\Controllers\ServicesController@web_dev"},{"host":null,"methods":["GET","HEAD"],"uri":"services\/app-development","name":"service.app","action":"App\Http\Controllers\ServicesController@app_dev"},{"host":null,"methods":["GET","HEAD"],"uri":"services\/domain-registration","name":"service.domain","action":"App\Http\Controllers\ServicesController@domain"},{"host":null,"methods":["GET","HEAD"],"uri":"services\/web-hosting","name":"service.hosting","action":"App\Http\Controllers\ServicesController@web_host"},{"host":null,"methods":["GET","HEAD"],"uri":"login","name":"login","action":"App\Http\Controllers\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"login","name":null,"action":"App\Http\Controllers\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"logout","name":"logout","action":"App\Http\Controllers\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"register","name":"register","action":"App\Http\Controllers\Auth\RegisterController@showRegistrationForm"},{"host":null,"methods":["POST"],"uri":"register","name":null,"action":"App\Http\Controllers\Auth\RegisterController@register"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset","name":"password.request","action":"App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm"},{"host":null,"methods":["POST"],"uri":"password\/email","name":"password.email","action":"App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset\/{token}","name":"password.reset","action":"App\Http\Controllers\Auth\ResetPasswordController@showResetForm"},{"host":null,"methods":["POST"],"uri":"password\/reset","name":"password.update","action":"App\Http\Controllers\Auth\ResetPasswordController@reset"},{"host":null,"methods":["GET","HEAD"],"uri":"email\/verify","name":"verification.notice","action":"App\Http\Controllers\Auth\VerificationController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"email\/verify\/{id}","name":"verification.verify","action":"App\Http\Controllers\Auth\VerificationController@verify"},{"host":null,"methods":["GET","HEAD"],"uri":"email\/resend","name":"verification.resend","action":"App\Http\Controllers\Auth\VerificationController@resend"},{"host":null,"methods":["GET","HEAD"],"uri":"beranda","name":"beranda","action":"App\Http\Controllers\Client\BerandaController@index"},{"host":null,"methods":["POST"],"uri":"wilayah\/kota","name":"wilayah.kota","action":"App\Http\Controllers\WilayahController@get_kota"},{"host":null,"methods":["POST"],"uri":"wilayah\/kecamatan","name":"wilayah.kecamatan","action":"App\Http\Controllers\WilayahController@get_kecamatan"},{"host":null,"methods":["POST"],"uri":"wilayah\/kelurahan","name":"wilayah.kelurahan","action":"App\Http\Controllers\WilayahController@get_kelurahan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin","name":"admin.","action":"App\Http\Controllers\Admin\Auth\LoginController@showLoginForm"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/login","name":"admin.login","action":"App\Http\Controllers\Admin\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"admin\/login","name":"admin.","action":"App\Http\Controllers\Admin\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"admin\/logout","name":"admin.logout","action":"App\Http\Controllers\Admin\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/password\/reset","name":"admin.password.request","action":"App\Http\Controllers\Admin\Auth\ForgotPasswordController@showLinkRequestForm"},{"host":null,"methods":["POST"],"uri":"admin\/password\/email","name":"admin.password.email","action":"App\Http\Controllers\Admin\Auth\ForgotPasswordController@sendResetLinkEmail"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/password\/reset\/{token}","name":"admin.password.reset","action":"App\Http\Controllers\Admin\Auth\ResetPasswordController@showResetForm"},{"host":null,"methods":["POST"],"uri":"admin\/password\/reset","name":"admin.password.update","action":"App\Http\Controllers\Admin\Auth\ResetPasswordController@reset"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/email\/verify","name":"admin.verification.notice","action":"App\Http\Controllers\Admin\Auth\VerificationController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/email\/verify\/{id}","name":"admin.verification.verify","action":"App\Http\Controllers\Admin\Auth\VerificationController@verify"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/email\/resend","name":"admin.verification.resend","action":"App\Http\Controllers\Admin\Auth\VerificationController@resend"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/beranda","name":"admin.beranda","action":"App\Http\Controllers\Admin\HomeController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/client\/list","name":"admin.client.list","action":"App\Http\Controllers\Admin\ClientController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/client\/detail\/{id}","name":"admin.client.detail","action":"App\Http\Controllers\Admin\ClientController@detail"},{"host":null,"methods":["GET","POST","HEAD"],"uri":"admin\/client\/tambah","name":"admin.client.tambah","action":"App\Http\Controllers\Admin\ClientController@tambah"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/domains","name":"admin.domain","action":"App\Http\Controllers\Admin\DomainController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/list","name":"admin.product","action":"App\Http\Controllers\Admin\ProductController@index"},{"host":null,"methods":["GET","POST","HEAD"],"uri":"admin\/product\/tambah","name":"admin.product.tambah","action":"App\Http\Controllers\Admin\ProductController@tambah"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/edit\/{id}","name":"admin.product.edit","action":"App\Http\Controllers\Admin\ProductController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/product\/update\/{id}","name":"admin.product.update","action":"App\Http\Controllers\Admin\ProductController@update"},{"host":null,"methods":["POST"],"uri":"admin\/product\/hapus\/{id}","name":"admin.product.delete","action":"App\Http\Controllers\Admin\ProductController@delete"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/category","name":"admin.category","action":"App\Http\Controllers\Admin\CategoryController@index"},{"host":null,"methods":["POST"],"uri":"admin\/product\/category\/simpan","name":"admin.category.simpan","action":"App\Http\Controllers\Admin\CategoryController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/category\/edit\/{id}","name":"admin.category.edit","action":"App\Http\Controllers\Admin\CategoryController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/product\/category\/update","name":"admin.category.update","action":"App\Http\Controllers\Admin\CategoryController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/category\/hapus\/{id}","name":"admin.category.hapus","action":"App\Http\Controllers\Admin\CategoryController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/domain","name":"admin.tld","action":"App\Http\Controllers\Admin\TLDsController@index"},{"host":null,"methods":["POST"],"uri":"admin\/domain\/simpan","name":"admin.tld.simpan","action":"App\Http\Controllers\Admin\TLDsController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/domain\/edit\/{id}","name":"admin.tld.edit","action":"App\Http\Controllers\Admin\TLDsController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/domain\/update","name":"admin.tld.update","action":"App\Http\Controllers\Admin\TLDsController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/domain\/hapus\/{id}","name":"admin.tld.hapus","action":"App\Http\Controllers\Admin\TLDsController@hapus"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                if (this.absolute && this.isOtherHost(route)){
                    return "//" + route.host + "/" + uri + qs;
                }

                return this.getCorrectUrl(uri + qs);
            },

            isOtherHost: function (route){
                return route.host && route.host != window.location.hostname;
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if ( ! this.absolute) {
                    return url;
                }

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

