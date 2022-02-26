const {src, dest, watch, parallel} = require("gulp");
const sass=require("gulp-sass")(require("sass"));
const plumber=require("gulp-plumber");

const webp = require("gulp-webp");
const imagemin=require("gulp-imagemin");
const cache=require("gulp-cache");
const avif=require("gulp-avif");


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
    done();
}

function versionWebp(done){
    const opciones={
        quality: 50
    };

    src("src/img/**/*.{png,jpg}")
        .pipe(webp(opciones))
        .pipe(dest("build/img"));
    done();
}

function versionAvif(done){
    const opciones={
        quality: 50
    };

    src("src/img/**/*.{png,jpg}")
        .pipe(avif(opciones))
        .pipe(dest("build/img"));
    done();
}

function imagenes(done){
    const opciones={
        optimizationLevel: 3
    };

    src("src/img/**/*.{png,jpg}")
        .pipe(cache(imagemin(opciones)))
        .pipe(dest("build/img"));
    done();
}


exports.css=css;
exports.versionWebp=versionWebp;
exports.versionAvif=versionAvif;
exports.imagenes=parallel(versionWebp, versionWebp, imagenes, versionAvif);
exports.dev=dev;

