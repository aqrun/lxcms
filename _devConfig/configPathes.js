var path = require('path');

module.exports = {
  appNodeModules: path.resolve(__dirname, '../node_modules'),
  'frontend': path.resolve(__dirname, '../app/appConfig.js'),
  'backend': path.resolve(__dirname, '../Modules/Backend/appConfig.js'),
};