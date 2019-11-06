(function () {

    var laroute = (function () {

        var routes = {

            absolute: true,
            rootUrl: 'https://pintasku2.dev',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"coba","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"lang\/{locale}","name":null,"action":"App\Http\Controllers\LocalizationController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":"home","action":"App\Http\Controllers\HomeController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"about-us","name":"about","action":"App\Http\Controllers\AboutController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"products","name":"product","action":"App\Http\Controllers\ProductController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"contact","name":"contact","action":"App\Http\Controllers\ContactController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"services\/web-development","name":"service.web","action":"App\Http\Controllers\ServicesController@web_dev"},{"host":null,"methods":["GET","HEAD"],"uri":"services\/app-development","name":"service.app","action":"App\Http\Controllers\ServicesController@app_dev"},{"host":null,"methods":["GET","HEAD"],"uri":"services\/domain-registration","name":"service.domain","action":"App\Http\Controllers\ServicesController@domain"},{"host":null,"methods":["GET","HEAD"],"uri":"services\/web-hosting","name":"service.hosting","action":"App\Http\Controllers\ServicesController@web_host"},{"host":null,"methods":["GET","HEAD"],"uri":"services\/detail","name":"service.detail","action":"App\Http\Controllers\ServicesController@detail_service"},{"host":null,"methods":["POST"],"uri":"wilayah\/kota","name":"wilayah.kota","action":"App\Http\Controllers\WilayahController@get_kota"},{"host":null,"methods":["POST"],"uri":"wilayah\/kecamatan","name":"wilayah.kecamatan","action":"App\Http\Controllers\WilayahController@get_kecamatan"},{"host":null,"methods":["POST"],"uri":"wilayah\/kelurahan","name":"wilayah.kelurahan","action":"App\Http\Controllers\WilayahController@get_kelurahan"},{"host":null,"methods":["GET","HEAD"],"uri":"login","name":"login","action":"App\Http\Controllers\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"login","name":null,"action":"App\Http\Controllers\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"logout","name":"logout","action":"App\Http\Controllers\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"register","name":"register","action":"App\Http\Controllers\Auth\RegisterController@showRegistrationForm"},{"host":null,"methods":["POST"],"uri":"register","name":null,"action":"App\Http\Controllers\Auth\RegisterController@register"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset","name":"password.request","action":"App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm"},{"host":null,"methods":["POST"],"uri":"password\/email","name":"password.email","action":"App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset\/{token}","name":"password.reset","action":"App\Http\Controllers\Auth\ResetPasswordController@showResetForm"},{"host":null,"methods":["POST"],"uri":"password\/reset","name":"password.update","action":"App\Http\Controllers\Auth\ResetPasswordController@reset"},{"host":null,"methods":["GET","HEAD"],"uri":"email\/verify","name":"verification.notice","action":"App\Http\Controllers\Auth\VerificationController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"email\/verify\/{id}","name":"verification.verify","action":"App\Http\Controllers\Auth\VerificationController@verify"},{"host":null,"methods":["GET","HEAD"],"uri":"email\/resend","name":"verification.resend","action":"App\Http\Controllers\Auth\VerificationController@resend"},{"host":null,"methods":["GET","HEAD"],"uri":"beranda","name":"beranda","action":"App\Http\Controllers\Client\BerandaController@index"},{"host":null,"methods":["GET","POST","HEAD"],"uri":"produk\/order","name":"order","action":"App\Http\Controllers\Client\ProductController@order"},{"host":null,"methods":["GET","POST","HEAD"],"uri":"produk\/order\/domain","name":"order.domain","action":"App\Http\Controllers\Client\ProductController@domain"},{"host":null,"methods":["GET","HEAD"],"uri":"produk\/produk-layanan-saya","name":"my_product","action":"App\Http\Controllers\Client\ProductController@my_product"},{"host":null,"methods":["GET","HEAD"],"uri":"produk\/lisensi-saya","name":"my_license","action":"App\Http\Controllers\Client\ProductController@my_license"},{"host":null,"methods":["GET","POST","HEAD"],"uri":"order\/konfigurasi","name":"order.config","action":"App\Http\Controllers\Client\OrderController@config"},{"host":null,"methods":["GET","POST","HEAD"],"uri":"order\/check-out","name":"order.checkout","action":"App\Http\Controllers\Client\OrderController@checkout"},{"host":null,"methods":["POST"],"uri":"order\/domain_register","name":"order.domain_register","action":"App\Http\Controllers\Client\OrderController@domain_register"},{"host":null,"methods":["POST"],"uri":"order\/change_cycles","name":"order.change_cycles","action":"App\Http\Controllers\Client\OrderController@change_cycles"},{"host":null,"methods":["GET","POST","HEAD"],"uri":"domain\/cari","name":"domain.cari","action":"App\Http\Controllers\Client\DomainController@cari"},{"host":null,"methods":["GET","HEAD"],"uri":"domain","name":"domain","action":"App\Http\Controllers\Client\DomainController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"domain\/detail\/{id}","name":"domain.detail","action":"App\Http\Controllers\Client\DomainController@detail"},{"host":null,"methods":["POST"],"uri":"domain\/cek_register","name":"domain.cek_register","action":"App\Http\Controllers\Client\DomainController@cek_register"},{"host":null,"methods":["GET","HEAD"],"uri":"tagihan","name":"invoice","action":"App\Http\Controllers\Client\InvoiceController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"tagihan\/detail\/{id}","name":"invoice.detail","action":"App\Http\Controllers\Client\InvoiceController@detail"},{"host":null,"methods":["GET","HEAD"],"uri":"admin","name":"admin.","action":"App\Http\Controllers\Admin\Auth\LoginController@showLoginForm"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/login","name":"admin.login","action":"App\Http\Controllers\Admin\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"admin\/login","name":"admin.","action":"App\Http\Controllers\Admin\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"admin\/logout","name":"admin.logout","action":"App\Http\Controllers\Admin\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/password\/reset","name":"admin.password.request","action":"App\Http\Controllers\Admin\Auth\ForgotPasswordController@showLinkRequestForm"},{"host":null,"methods":["POST"],"uri":"admin\/password\/email","name":"admin.password.email","action":"App\Http\Controllers\Admin\Auth\ForgotPasswordController@sendResetLinkEmail"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/password\/reset\/{token}","name":"admin.password.reset","action":"App\Http\Controllers\Admin\Auth\ResetPasswordController@showResetForm"},{"host":null,"methods":["POST"],"uri":"admin\/password\/reset","name":"admin.password.update","action":"App\Http\Controllers\Admin\Auth\ResetPasswordController@reset"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/email\/verify","name":"admin.verification.notice","action":"App\Http\Controllers\Admin\Auth\VerificationController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/email\/verify\/{id}","name":"admin.verification.verify","action":"App\Http\Controllers\Admin\Auth\VerificationController@verify"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/email\/resend","name":"admin.verification.resend","action":"App\Http\Controllers\Admin\Auth\VerificationController@resend"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/beranda","name":"admin.beranda","action":"App\Http\Controllers\Admin\HomeController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/client\/list","name":"admin.client.list","action":"App\Http\Controllers\Admin\ClientController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/client\/detail\/{id}","name":"admin.client.detail","action":"App\Http\Controllers\Admin\ClientController@detail"},{"host":null,"methods":["GET","POST","HEAD"],"uri":"admin\/client\/tambah","name":"admin.client.tambah","action":"App\Http\Controllers\Admin\ClientController@tambah"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/domains","name":"admin.domain","action":"App\Http\Controllers\Admin\DomainController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/order\/list","name":"admin.order","action":"App\Http\Controllers\Admin\OrderController@index"},{"host":null,"methods":["GET","POST","HEAD"],"uri":"admin\/order\/tambah","name":"admin.order.tambah","action":"App\Http\Controllers\Admin\OrderController@tambah"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/order\/detail\/{id}","name":"admin.order.detail","action":"App\Http\Controllers\Admin\OrderController@detail"},{"host":null,"methods":["POST"],"uri":"admin\/order\/update\/{id}","name":"admin.order.update","action":"App\Http\Controllers\Admin\OrderController@update"},{"host":null,"methods":["POST"],"uri":"admin\/order\/hapus\/{id}","name":"admin.order.delete","action":"App\Http\Controllers\Admin\OrderController@delete"},{"host":null,"methods":["POST"],"uri":"admin\/order\/add_cart","name":"admin.order.add_cart","action":"App\Http\Controllers\Admin\OrderController@add_cart"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/order\/remove_cart\/{id}","name":"admin.order.remove_cart","action":"App\Http\Controllers\Admin\OrderController@remove_cart"},{"host":null,"methods":["POST"],"uri":"admin\/order\/change_cycles","name":"admin.order.change_cycles","action":"App\Http\Controllers\Admin\OrderController@change_cycles"},{"host":null,"methods":["POST"],"uri":"admin\/order\/add_domain","name":"admin.order.add_domain","action":"App\Http\Controllers\Admin\OrderController@add_domain"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/list","name":"admin.product","action":"App\Http\Controllers\Admin\ProductController@index"},{"host":null,"methods":["GET","POST","HEAD"],"uri":"admin\/product\/tambah","name":"admin.product.tambah","action":"App\Http\Controllers\Admin\ProductController@tambah"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/edit\/{id}","name":"admin.product.edit","action":"App\Http\Controllers\Admin\ProductController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/product\/update\/{id}","name":"admin.product.update","action":"App\Http\Controllers\Admin\ProductController@update"},{"host":null,"methods":["POST"],"uri":"admin\/product\/hapus\/{id}","name":"admin.product.delete","action":"App\Http\Controllers\Admin\ProductController@delete"},{"host":null,"methods":["POST"],"uri":"admin\/product\/product","name":"admin.product.json","action":"App\Http\Controllers\Admin\ProductController@get_kota"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/web_app","name":"admin.product.web_app","action":"App\Http\Controllers\Admin\ProductController@web_app"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/web_dev","name":"admin.product.web_dev","action":"App\Http\Controllers\Admin\ProductController@web_dev"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/app_dev","name":"admin.product.app_dev","action":"App\Http\Controllers\Admin\ProductController@app_dev"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/category","name":"admin.category","action":"App\Http\Controllers\Admin\CategoryController@index"},{"host":null,"methods":["POST"],"uri":"admin\/product\/category\/simpan","name":"admin.category.simpan","action":"App\Http\Controllers\Admin\CategoryController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/category\/edit\/{id}","name":"admin.category.edit","action":"App\Http\Controllers\Admin\CategoryController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/product\/category\/update","name":"admin.category.update","action":"App\Http\Controllers\Admin\CategoryController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/category\/hapus\/{id}","name":"admin.category.hapus","action":"App\Http\Controllers\Admin\CategoryController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/domain","name":"admin.tld","action":"App\Http\Controllers\Admin\TLDsController@index"},{"host":null,"methods":["POST"],"uri":"admin\/domain\/simpan","name":"admin.tld.simpan","action":"App\Http\Controllers\Admin\TLDsController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/domain\/edit\/{id}","name":"admin.tld.edit","action":"App\Http\Controllers\Admin\TLDsController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/domain\/update","name":"admin.tld.update","action":"App\Http\Controllers\Admin\TLDsController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/domain\/hapus\/{id}","name":"admin.tld.hapus","action":"App\Http\Controllers\Admin\TLDsController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/billing\/invoice","name":"admin.invoice","action":"App\Http\Controllers\Admin\InvoiceController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/billing\/invoice\/detail\/{id}","name":"admin.invoice.detail","action":"App\Http\Controllers\Admin\InvoiceController@detail"},{"host":null,"methods":["POST"],"uri":"admin\/billing\/invoice\/pembayaran","name":"admin.invoice.pembayaran","action":"App\Http\Controllers\Admin\InvoiceController@pembayaran"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/billing\/transaksi","name":"admin.transaksi","action":"App\Http\Controllers\Admin\TransaksiController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/billing\/transaksi\/detail\/{id}","name":"admin.transaksi.detail","action":"App\Http\Controllers\Admin\TransaksiController@detail"}],
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

