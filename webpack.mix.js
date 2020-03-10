const mix = require("laravel-mix");
mix
  .styles(
    [
      "resources/sass/bootstrap.css",
      "resources/sass/dashboard.css",
      "resources/js/DataTables/datatables.css",
      "resources/sass/tabela.css",
      "resources/sass/custom.css",
      "node_modules/jquery-nestable/jquery.nestable.css"
      //"vendor/fortawesome/font-awesome/css/fontawesome.css"
    ],
    "public/css/app.css"
  )
  .sass("resources/sass/app.scss", "public/css")
  .scripts(
    [
      "node_modules/jquery/dist/jquery.slim.js",
      "node_modules/jquery/dist/jquery.js",
      "node_modules/bootstrap/dist/js/bootstrap.js",
      "node_modules/datatables.net/js/jquery.dataTables.js",
      "node_modules/bootbox/dist/bootbox.all.min.js",
      "node_modules/jquery-nestable/jquery.nestable.js",
      "resources/js/admin/menu/index.js"
      //"vendor/fortawesome/font-awesome/js/fontawesome.js"
    ],
    "public/js/app.js"
  );

