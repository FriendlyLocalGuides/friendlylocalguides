module.exports = function(grunt){
    grunt.initConfig({
        uglify: {
            my_target: {
                files: {
                    'js/script.js' : ['frontend-components/js/*.js']
                }
            }
        }
    });
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.registerTask('default', 'watch');
};