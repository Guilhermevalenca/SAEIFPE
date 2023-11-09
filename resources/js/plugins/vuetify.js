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
                    primary: '#1867C0', //azul
                    secondary: '#2f9e41', //verde claro
                    tertiary: '#2f9e41',
                    quaternary: '#cd191e', //vermelho
                    background: '#e1e6d2',
                },
            },
            dark: {
                colors: {
                    primary: '#1867C0', //azul
                    surface: '#121212', //preto
                    secondary: '#00420c', //verde escuro
                    tertiary: '#2f9e41',
                    quaternary: '#cd191e',
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
