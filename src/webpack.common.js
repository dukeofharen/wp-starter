/* eslint-disable @typescript-eslint/no-var-requires */
const path = require('path');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const ForkTsCheckerWebpackPlugin = require('fork-ts-checker-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CopyPlugin = require('copy-webpack-plugin');
const ESLintPlugin = require('eslint-webpack-plugin');

module.exports = {
    entry: './assets/scripts/index.ts',
    mode: 'development',
    devtool: 'source-map',
    optimization: {
        usedExports: true
    },
    output: {
        filename: 'scripts/main.bundle.js',
        path: path.resolve(__dirname, 'public')
    },
    module: {
        rules: [
            {
                test: /\.tsx?$/,
                exclude: /node_modules/,
                use: {
                    loader: 'ts-loader',
                    options: {
                        // disable type checker - we will use it in fork plugin
                        transpileOnly: true
                    }
                }
            },
            {
                test: /\.(scss|css)$/,
                use: [
                    process.env.NODE_ENV !== 'production'
                        ? 'style-loader'
                        : MiniCssExtractPlugin.loader,
                    'css-loader',
                    {
                        loader: 'sass-loader',
                        options: {
                            sourceMap: true
                        }
                    }
                ]
            }
        ]
    },
    resolve: {
        extensions: ['.tsx', '.ts', '.js']
    },
    plugins: [
        new MiniCssExtractPlugin({
            // Options similar to the same options in webpackOptions.output
            // both options are optional
            filename: '[name].bundle.css',
            chunkFilename: '[id].css'
        }),
        new CleanWebpackPlugin(),
        new ForkTsCheckerWebpackPlugin(),
        new CopyPlugin({
            patterns: [{ from: 'assets/static', to: 'static' }]
        }),
        new ESLintPlugin({
            extensions: ['.tsx', '.ts', '.js'],
            exclude: 'node_modules',
            context: 'assets'
        })
    ]
};