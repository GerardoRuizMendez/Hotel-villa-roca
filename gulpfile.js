const {src, dest, watch} = require("gulp");
const sass=require("gulp-sass")(require("sass"));
const plumber=require("gulp-plumber");

function css(done){
    src("src/scss/**/*.scss")
        .pipe(plumber())
        .pipe(sass())
        .pipe(dest("build/css"))
    console.log("compilando SASS");
    done();
}

function dev(done){
    watch("src/scss/**/*.scss",css);
}

exports.css=css;
exports.dev=dev;