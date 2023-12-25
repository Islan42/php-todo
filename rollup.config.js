import babel from '@rollup/plugin-babel';
import { nodeResolve } from '@rollup/plugin-node-resolve';
import commonjs from '@rollup/plugin-commonjs';
import replace from '@rollup/plugin-replace';

export default {
	input: 'src/todos/show-app.js',
	output: {
		file: 'public/static/js/todos/show-app.js',
		format: 'es'
	},
	plugins: [
		nodeResolve(),
		babel({ babelHelpers: 'bundled' }),
		commonjs(),
		replace({
			preventAssignment: false,
			'process.env.NODE_ENV': '"development"'
		}),
	],
}