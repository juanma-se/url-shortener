import "../../css/app.css"
import "../../js/bootstrap"
import "@fontsource-variable/inter"

import { createInertiaApp } from "@inertiajs/react"
import { createRoot } from "react-dom/client"
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers"

const appName = import.meta.env.VITE_APP_NAME || 'GoURL';

createInertiaApp({
    title: title => `${title} - ${appName}`,
    resolve: name => resolvePageComponent(`./Pages/${name}.jsx`, import.meta.glob("./Pages/**/*.jsx")),
    setup({ el, App, props }) {
        createRoot(el).render(<App {...props} />)
    },
    progress: {
        color: '#4B5563',
    }
})
