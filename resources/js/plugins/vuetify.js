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
                    secondary: '#2E8429',
                    card_colors: '#ffffff',
                    background: '#e1e6d3'
                },
            },
            dark: {
                colors: {
                    secondary: '#2E8429',
                    card_colors: '#1C1C1C'
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
            color: 'card_colors'
        },
        VFooter: {
            color: 'background'
        }
    }
})
