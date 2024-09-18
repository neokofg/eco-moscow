import { defineConfig } from 'orval';

export default defineConfig({
  petstore: {
    output: {
      mode: 'tags-split',
      target: 'src/gen/api.ts',
      schemas: 'src/gen/models',
      mock: false,
      client: 'react-query',
      prettier: true,
      override: {
        mutator: {
          path: './custom-fetch.ts',
          name: 'customFetch',
        },
      },
    },
    input: {
      target: './openapi.yaml',
    },
  },
});