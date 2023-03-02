const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  outputDir: "../backend/public",
  indexPath: "../resources/views/spa.blade.php",
  transpileDependencies: true
})
