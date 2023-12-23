import babel from '@rollup/plugin-babel';
import { nodeResolve } from '@rollup/plugin-node-resolve';
import commonjs from '@rollup/plugin-commonjs';
import replace from '@rollup/plugin-replace';

export default {
	input: 'src/show.js',
	output: {
		file: 'public/static/show.js',
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