export default defineConfig({
    base: '/build/',
    build: {
        outDir: 'public/build',
        manifest: true,
        emptyOutDir: true,
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
