/**
 * plugins/vuetify.js
 *
 * Framework documentation: https://vuetifyjs.com`
 */

// Styles
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/styles'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

// Composables
import { createVuetify } from 'vuetify'

// https://vuetifyjs.com/en/introduction/why-vuetify/#feature-guides
export default createVuetify({
    components,
    directives,
    theme: {
        defaultTheme: 'light',
        themes: {
            light: {
                colors: {
                    primary: '#1867C0',
                    secondary: '#2f9e41',
                    tertiary: '#2f9e41',
                    quaternary: '#cd191e',
                    background: '#e1e6d2',
                },
            },
            dark: {
                colors: {
                    surface: '#121212',
                    secondary: '#00420c',
                    tertiary: '#2f9e41',
                    background: '#212121',
                },
            },
        },
    },
    defaults: {
        VBtn: {
            variant: 'tonal'
        },
        VTextField: {
            variant: 'outlined',
            clearable: true
        },
        VSelect: {
            variant: 'outlined'
        },
        VCard: {
            style: 'border-color: #2E8429;',
        }
    }
})
