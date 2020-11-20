(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[17],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/registration.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/registration.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _comp_header__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./comp/header */ "./resources/js/components/comp/header/index.vue");
/* harmony import */ var _comp_footer_index__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./comp/footer/index */ "./resources/js/components/comp/footer/index.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    headerr: _comp_header__WEBPACK_IMPORTED_MODULE_0__["default"],
    footerr: _comp_footer_index__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  data: function data() {
    return {
      loading: false,
      name: "",
      email: "",
      password: "",
      password_confirmation: "",
      has_error: false,
      ratelimit: false,
      error_delay: false,
      error: "",
      errors: {},
      success: false,
      phone: "",
      verify: "",
      identify: "",
      wrongNum: false,
      wrongCode: false,
      success_send: false
    };
  },
  methods: {
    register: function register() {
      var _this = this;

      var app = this;

      if (/^(\+98|0)?9\d{9}$/.test(this.phone)) {
        this.loading = true;
        axios.post("/api/auth/register", {
          phone: this.phone,
          identify: this.identify
        }).then(function (response) {
          app.success = true;
          app.success_send = true;
          _this.loading = false;
          setTimeout(function () {
            app.success_send = !app.success_send;
          }, 5000);
        })["catch"](function (error) {
          app.has_error = true;
          _this.loading = false;
          setTimeout(function () {
            app.has_error = !app.has_error;
          }, 5000);
        });
      } else {
        // console.log("phone uncorrect");
        this.wrongNum = true;
        setTimeout(function () {
          app.wrongNum = !app.wrongNum;
        }, 5000);
      }
    },
    login: function login() {
      var _this2 = this;

      var app = this;
      this.loading = true;
      var packet = {
        otp: this.verify,
        phone: this.phone
      };
      this.$store.dispatch("AUTH_REQUEST", packet).then(function () {
        _this2.loading = false;

        _this2.$router.push("/");
      })["catch"](function (err) {
        console.log(err.message);

        if (err.message === "Request failed with status code 429") {
          app.ratelimit = true;
          _this2.loading = false;
          setTimeout(function () {
            app.ratelimit = !app.ratelimit;
          }, 5000);
        }

        if (err.message === "Request failed with status code 401") {
          app.error_delay = true;
          _this2.loading = false;
          setTimeout(function () {
            app.error_delay = !app.error_delay;
          }, 5000);
        }

        if (err.message === "Request failed with status code 402") {
          _this2.wrongCode = true;
          _this2.loading = false;
          setTimeout(function () {
            app.wrongCode = !app.wrongCode;
          }, 5000);
        }
      });
    },
    goToLogin: function goToLogin() {
      this.$router.replace({
        name: 'login'
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/registration.vue?vue&type=style&index=0&lang=css&":
/*!******************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/registration.vue?vue&type=style&index=0&lang=css& ***!
  \******************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.btn-vrify {\n    direction: rtl;\n    background-color: #7FD8D5;\n    color: #ffffff;\n    border-radius: 6px;\n    padding: 0.7rem 1.2rem;\n    border: 0.7px solid #ffffff;\n    transition: 0.4s background-color;\n}\n.btn-vrify:focus {\n    outline: none;\n}\n.btn-vrify:hover {\n    color: white !important;\n    background-color: #7FD8D5;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/registration.vue?vue&type=style&index=0&lang=css&":
/*!**********************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/registration.vue?vue&type=style&index=0&lang=css& ***!
  \**********************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../node_modules/css-loader??ref--5-1!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/src??ref--5-2!../../../node_modules/vue-loader/lib??vue-loader-options!./registration.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/registration.vue?vue&type=style&index=0&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/registration.vue?vue&type=template&id=baa3d7f8&":
/*!***************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/registration.vue?vue&type=template&id=baa3d7f8& ***!
  \***************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticStyle: { "background-color": "#f2f2f2 !important" } },
    [
      _c("headerr"),
      _vm._v(" "),
      _c(
        "div",
        {
          directives: [
            {
              name: "show",
              rawName: "v-show",
              value: _vm.loading,
              expression: "loading"
            }
          ],
          staticClass: "loading"
        },
        [_vm._m(0)]
      ),
      _vm._v(" "),
      _c(
        "div",
        {
          directives: [
            {
              name: "show",
              rawName: "v-show",
              value: _vm.wrongNum,
              expression: "wrongNum"
            }
          ],
          staticClass: "notif"
        },
        [
          _c(
            "div",
            {
              staticClass: "alert alert-danger text-right",
              attrs: { role: "alert" }
            },
            [_vm._v("شماره موبایل خود را به درستی وارد کنید")]
          )
        ]
      ),
      _vm._v(" "),
      _c(
        "div",
        {
          directives: [
            {
              name: "show",
              rawName: "v-show",
              value: _vm.has_error,
              expression: "has_error"
            }
          ],
          staticClass: "notif"
        },
        [
          _c(
            "div",
            {
              staticClass: "alert alert-danger text-right",
              attrs: { role: "alert" }
            },
            [_vm._v("شماره موبایل قبلا ثبت نام کرده است")]
          )
        ]
      ),
      _vm._v(" "),
      _c(
        "div",
        {
          directives: [
            {
              name: "show",
              rawName: "v-show",
              value: _vm.ratelimit,
              expression: "ratelimit"
            }
          ],
          staticClass: "notif"
        },
        [
          _c(
            "div",
            {
              staticClass: "alert alert-danger text-right",
              attrs: { role: "alert" }
            },
            [
              _vm._v(
                "شما بیش تر از حد مجاز وارد شده اید. لطفا یک دقیقه\n            صبر کنید\n        "
              )
            ]
          )
        ]
      ),
      _vm._v(" "),
      _c(
        "div",
        {
          directives: [
            {
              name: "show",
              rawName: "v-show",
              value: _vm.error_delay,
              expression: "error_delay"
            }
          ],
          staticClass: "notif"
        },
        [
          _c(
            "div",
            {
              staticClass: "alert alert-danger text-right",
              attrs: { role: "alert" }
            },
            [
              _vm._v(
                "مدت زمان کد شما منقضی شده است. لطفا مجدد برای دریافت\n            کد اقدام کنید\n        "
              )
            ]
          )
        ]
      ),
      _vm._v(" "),
      _c(
        "div",
        {
          directives: [
            {
              name: "show",
              rawName: "v-show",
              value: _vm.success_send,
              expression: "success_send"
            }
          ],
          staticClass: "notif"
        },
        [
          _c(
            "div",
            {
              staticClass: "alert alert-success text-right",
              attrs: { role: "alert" }
            },
            [_vm._v("پیامک با موفقیت ارسال شد")]
          )
        ]
      ),
      _vm._v(" "),
      _c(
        "div",
        {
          directives: [
            {
              name: "show",
              rawName: "v-show",
              value: _vm.wrongCode,
              expression: "wrongCode"
            }
          ],
          staticClass: "notif"
        },
        [
          _c(
            "div",
            {
              staticClass: "alert alert-danger text-right",
              attrs: { role: "alert" }
            },
            [_vm._v("کد وارد شده درست نمی باشد")]
          )
        ]
      ),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "col-12",
          class: [
            _vm.wrongNum ||
            _vm.has_error ||
            _vm.success_send ||
            _vm.wrongCode ||
            _vm.ratelimit ||
            _vm.error_delay
              ? "pt5-sm"
              : "pt5"
          ]
        },
        [
          _c("div", { staticClass: "login-box" }, [
            _vm._m(1),
            _vm._v(" "),
            _c("div", { staticClass: "col-12 m-auto" }, [
              _c("div", { staticClass: "col-12 mt-4" }, [
                _vm._m(2),
                _vm._v(" "),
                _c("div", { staticClass: "my-input-box" }, [
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-10" }, [
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.phone,
                            expression: "phone"
                          }
                        ],
                        staticClass: "my-input-create",
                        attrs: {
                          placeholder: "شماره موبایل خود را وارد کنید "
                        },
                        domProps: { value: _vm.phone },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.phone = $event.target.value
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        directives: [
                          {
                            name: "show",
                            rawName: "v-show",
                            value: /^(\+98|0)?9\d{9}$/.test(_vm.phone),
                            expression: "(/^(\\+98|0)?9\\d{9}$/.test(phone))"
                          }
                        ],
                        staticClass: "col-2 text-success"
                      },
                      [_c("i", { staticClass: "fas fa-check float-left pt-2" })]
                    )
                  ])
                ])
              ]),
              _vm._v(" "),
              _vm.success === true
                ? _c("div", { staticClass: "col-12" }, [
                    _vm._m(3),
                    _vm._v(" "),
                    _c("div", { staticClass: "my-input-box" }, [
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.verify,
                            expression: "verify"
                          }
                        ],
                        staticClass: "my-input-create",
                        attrs: { placeholder: "کد پیامک شده را وارد کنید" },
                        domProps: { value: _vm.verify },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.verify = $event.target.value
                          }
                        }
                      })
                    ])
                  ])
                : _vm._e(),
              _vm._v(" "),
              _vm.success === false
                ? _c("div", { staticClass: "col-12" }, [
                    _vm._m(4),
                    _vm._v(" "),
                    _c("div", { staticClass: "my-input-box" }, [
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.identify,
                            expression: "identify"
                          }
                        ],
                        staticClass: "my-input-create",
                        attrs: { placeholder: "کد معرف را وارد کنید" },
                        domProps: { value: _vm.identify },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.identify = $event.target.value
                          }
                        }
                      })
                    ])
                  ])
                : _vm._e(),
              _vm._v(" "),
              _c("div", { staticClass: "col-12 text-center mt-5" }, [
                !_vm.success
                  ? _c(
                      "button",
                      {
                        staticClass: "btn-vrify ",
                        on: { click: _vm.register }
                      },
                      [
                        _vm._v(
                          "\n                        دریافت کد فعال سازی\n                        "
                        ),
                        _c("i", { staticClass: "fas fa-check" })
                      ]
                    )
                  : _vm._e(),
                _vm._v(" "),
                _vm.success === true
                  ? _c(
                      "button",
                      { staticClass: "btn-vrify", on: { click: _vm.login } },
                      [
                        _vm._v(
                          "\n                        فعال سازی\n                        "
                        ),
                        _c("i", { staticClass: "fas fa-check" })
                      ]
                    )
                  : _vm._e()
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-12 rtl" }, [
                _c("h6", { staticClass: "text-center pt-4 cursor-d" }, [
                  _vm._v("اگه ثبت نام کردی،\n                        "),
                  _c(
                    "span",
                    {
                      staticClass: " text-sormei cursor-p",
                      on: { click: _vm.goToLogin }
                    },
                    [_vm._v("وارد شو !")]
                  )
                ])
              ])
            ])
          ])
        ]
      ),
      _vm._v(" "),
      _c("footerr")
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "spinner-border text-warning", attrs: { role: "status" } },
      [_c("span", { staticClass: "sr-only" }, [_vm._v("Loading...")])]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-12 m-auto title-box p-0" }, [
      _c("div", { staticClass: "col-12 pt-3 pb-2" }, [
        _c("h3", { staticClass: "text-center" }, [
          _vm._v("ثبت نام در یونی پلاس")
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "label-create" }, [
      _c("span", { staticClass: "bg-white px-2" }, [_vm._v("شماره موبایل")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "label-create" }, [
      _c("span", { staticClass: "bg-white px-2" }, [_vm._v("کد اعتبارسنجی")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "label-create" }, [
      _c("span", { staticClass: "bg-white px-2" }, [
        _vm._v("کد معرف (اختیاری)")
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () { injectStyles.call(this, this.$root.$options.shadowRoot) }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./resources/js/components/registration.vue":
/*!**************************************************!*\
  !*** ./resources/js/components/registration.vue ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _registration_vue_vue_type_template_id_baa3d7f8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./registration.vue?vue&type=template&id=baa3d7f8& */ "./resources/js/components/registration.vue?vue&type=template&id=baa3d7f8&");
/* harmony import */ var _registration_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./registration.vue?vue&type=script&lang=js& */ "./resources/js/components/registration.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _registration_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./registration.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/registration.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _registration_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _registration_vue_vue_type_template_id_baa3d7f8___WEBPACK_IMPORTED_MODULE_0__["render"],
  _registration_vue_vue_type_template_id_baa3d7f8___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/registration.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/registration.vue?vue&type=script&lang=js&":
/*!***************************************************************************!*\
  !*** ./resources/js/components/registration.vue?vue&type=script&lang=js& ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_registration_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./registration.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/registration.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_registration_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/registration.vue?vue&type=style&index=0&lang=css&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/registration.vue?vue&type=style&index=0&lang=css& ***!
  \***********************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_registration_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/style-loader!../../../node_modules/css-loader??ref--5-1!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/src??ref--5-2!../../../node_modules/vue-loader/lib??vue-loader-options!./registration.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/registration.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_registration_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_registration_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_registration_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_registration_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_registration_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/components/registration.vue?vue&type=template&id=baa3d7f8&":
/*!*********************************************************************************!*\
  !*** ./resources/js/components/registration.vue?vue&type=template&id=baa3d7f8& ***!
  \*********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_registration_vue_vue_type_template_id_baa3d7f8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./registration.vue?vue&type=template&id=baa3d7f8& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/registration.vue?vue&type=template&id=baa3d7f8&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_registration_vue_vue_type_template_id_baa3d7f8___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_registration_vue_vue_type_template_id_baa3d7f8___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);