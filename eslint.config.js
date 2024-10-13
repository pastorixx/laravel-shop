import pluginJs from '@eslint/js';
import pluginVue from 'eslint-plugin-vue';
import globals from 'globals';

export default [
  {
    files: ['**/*.{js,mjs,cjs,vue}']
  },
  {
    languageOptions: {
      globals: {
        ...globals.browser,
        axios: 'readonly'
      }
    }
  },
  pluginJs.configs.recommended,
  ...pluginVue.configs['flat/essential'],
  {
    rules: {
      // Vue
      'vue/require-default-prop': 1,
      'vue/html-indent': [
        'error',
        2,
        {
          attribute: 1,
          baseIndent: 1,
          closeBracket: 0,
          alignAttributesVertically: true,
          ignores: []
        }
      ],
      'vue/component-name-in-template-casing': [
        'error',
        'PascalCase',
        {
          registeredComponentsOnly: true
        }
      ],
      'vue/component-definition-name-casing': ['error', 'PascalCase'],
      'vue/match-component-file-name': [
        'error',
        {
          extensions: ['vue'],
          shouldMatchCase: false
        }
      ],
      'vue/no-dupe-keys': [
        'error',
        {
          groups: []
        }
      ],
      'vue/order-in-components': [
        'error',
        {
          order: [
            'el',
            'name',
            'key',
            'parent',
            'functional',
            ['delimiters', 'comments'],
            ['components', 'directives', 'filters'],
            'extends',
            'mixins',
            ['provide', 'inject'],
            'ROUTER_GUARDS',
            'layout',
            'middleware',
            'validate',
            'scrollToTop',
            'transition',
            'loading',
            'inheritAttrs',
            'model',
            ['props', 'propsData'],
            'emits',
            'setup',
            'asyncData',
            'data',
            'fetch',
            'head',
            'computed',
            'watch',
            'watchQuery',
            'LIFECYCLE_HOOKS',
            'methods',
            ['template', 'render'],
            'renderError'
          ]
        }
      ],
      'vue/attributes-order': [
        'error',
        {
          order: [
            'DEFINITION',
            'LIST_RENDERING',
            'CONDITIONALS',
            'RENDER_MODIFIERS',
            'GLOBAL',
            ['UNIQUE', 'SLOT'],
            'TWO_WAY_BINDING',
            'OTHER_DIRECTIVES',
            'OTHER_ATTR',
            'EVENTS',
            'CONTENT'
          ],
          alphabetical: false
        }
      ],
      'vue/max-attributes-per-line': [
        'error',
        {
          singleline: {
            max: 1
          },
          multiline: {
            max: 1
          }
        }
      ],
      'vue/attribute-hyphenation': [
        'error',
        'always',
        {
          ignore: []
        }
      ],
      'vue/html-self-closing': [
        'error',
        {
          html: {
            void: 'always',
            normal: 'always',
            component: 'always'
          },
          svg: 'always',
          math: 'always'
        }
      ],
      'vue/no-irregular-whitespace': [
        'error',
        {
          skipStrings: true,
          skipComments: false,
          skipRegExps: false,
          skipTemplates: false,
          skipHTMLAttributeValues: false,
          skipHTMLTextContents: false
        }
      ],
      // Default
      'comma-dangle': [
        'error',
        {
          arrays: 'never',
          objects: 'never',
          imports: 'never',
          exports: 'never',
          functions: 'never'
        }
      ],
      'object-curly-spacing': ['error', 'always'],
      'object-curly-newline': [
        'error',
        {
          ObjectExpression: { multiline: true, consistent: true },
          ObjectPattern: { multiline: true, consistent: true }
        }
      ],
      semi: ['error', 'always'],
      quotes: [
        'error',
        'single',
        {
          avoidEscape: true,
          allowTemplateLiterals: true
        }
      ],
      indent: ['error', 2],
      'func-names': ['error', 'always'],
      'max-len': [
        'error',
        {
          code: 125,
          ignoreStrings: true
        }
      ],
      camelcase: ['error', { properties: 'never' }],
      'class-methods-use-this': 1,
      'consistent-return': 0,
      'import/no-extraneous-dependencies': 0,
      'no-alert': 'off',
      'no-console': 'off',
      'no-continue': 1,
      'no-multi-assign': [
        'error',
        {
          ignoreNonDeclaration: true
        }
      ],
      'no-new': 1,
      'no-param-reassign': [
        'warn',
        {
          props: false
        }
      ],
      'no-plusplus': 1,
      'no-return-assign': 1,
      'no-tabs': 1,
      'no-underscore-dangle': 1,
      'no-unused-vars': ['error', { argsIgnorePattern: '^_' }],
      'prefer-destructuring': [
        'error',
        {
          array: false,
          object: true
        },
        {
          enforceForRenamedProperties: false
        }
      ]
    }
  }
];
