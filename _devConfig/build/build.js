// https://github.com/shelljs/shelljs
require('shelljs/global');
env.NODE_ENV = 'production';

var path = require('path');
var ora = require('ora');
var webpack = require('webpack');
var fs = require('fs');

var config = require('../config');

var webpackConfig = require('./webpack.prod.conf')

console.log(
  '  Tip:\n' +
  '  Built files are meant to be served over an HTTP server.\n' +
  '  Opening index.html over file:// won\'t work.\n'
)

var spinner = ora('building for production...')
spinner.start()


var assetsPath = path.join(config.build.assetsRoot, config.build.assetsSubDirectory)
rm('-rf', assetsPath)
mkdir('-p', assetsPath)
//cp('-R', 'static/', assetsPath)

webpack(webpackConfig, function (err, stats) {
  spinner.stop()
  if (err) throw err

  //write hash
  if(typeof config.hashFile != 'undefined'){
    fs.writeFile(config.hashFile, stats.hash, function(hashErr){
      if(hashErr){ throw hashErr;}
    })
  }

  //build end handle
  if( typeof config.buildEnd != 'undefined'){
    config.buildEnd();
  }

  process.stdout.write(stats.toString({
    colors: true,
    modules: false,
    children: false,
    chunks: false,
    chunkModules: false
  }) + '\n')
})
