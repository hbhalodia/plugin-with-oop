#!/usr/bin/env node

const path    = require( 'path' );
const fs      = require( 'fs' );
const prompt  = require( 'prompt-sync' )();
const replace = require( 'replace-in-file' );
const rootDir = path.join( __dirname, '../..' );

// Helpers
const fgRed     = '\x1b[31m';
const fgGreen   = '\x1b[32m';
const fgBlue    = '\x1b[34m';
const fgMagenta = '\x1b[35m';
const fgCyan    = '\x1b[36m';

// Functions
const consoleOutput = ( color, text ) => {
	console.log( color, text );
};

const findReplace = ( findString, replaceString ) => {
	const regex = new RegExp( findString, 'g' );
	const options = {
		files: `${rootDir}/**/*`,
		from: regex,
		to: replaceString,
		ignore: [
			`${rootDir}/**/node_modules/**/*`,
			`${rootDir}/.git/**/*`,
			`${rootDir}/.github/**/*`,
			`${rootDir}/**/vendor/**/*`,
			`${rootDir}/**/bin/init.js`
		]
	};

	try {
		const changes = replace.sync( options );
		consoleOutput( fgGreen, `${findString}-> ${replaceString}. Modified files: ${changes.join( ', ' )}` );
	} catch ( error ) {
		console.error( 'Error occurred:', error );
	}
};

// Main script
consoleOutput( fgGreen, 'The script will uniquely set up your plugin.' );
consoleOutput( fgGreen, '* - required' );

// Plugin name
consoleOutput( fgGreen, 'Please enter plugin name (shown in WordPress admin)*:' );

let pluginName;
do {
	consoleOutput( fgGreen, '' );
	pluginName = prompt( 'Plugin name: ' );

	if ( null !== pluginName && pluginName.length ) {
		pluginName = pluginName.trim();
	} else {
		consoleOutput( fgRed, 'Plugin name field is required and cannot be empty.' );
	}
} while ( 0 >= pluginName.length );

// Plugin Version.
const pluginVersion = '1.0.0';

const lowerPluginName = pluginName.toLowerCase().trim();
const lowerWithHyphen = lowerPluginName.replace( /\W+/g, '-' ).trim();
const lowerWithUnderscore = lowerPluginName.replace( /\W+/g, '_' ).trim();
const lowerPrefixWithHyphen = lowerWithHyphen + '-';
const lowerPrefixWithunderscore = lowerWithUnderscore + '_';

const camelCasePluginName = pluginName.replace( /\w\S*/g, function ( txt ) {
	return txt.charAt( 0 ).toUpperCase() + txt.substr( 1 ).toLowerCase();
} );
const camelCaseWithHyphen = camelCasePluginName.replace( /\W+/g, '-' ).trim();
const camelCaseWithUnderscore = camelCasePluginName.replace( /\W+/g, '_' ).trim();
const camelCasePrefixWithHyphen = camelCaseWithHyphen + '-';
const camelCasePrefixWithUnderscore = camelCaseWithUnderscore + '_';

const upperPluginName = pluginName.toUpperCase().trim();
const upperWithHyphen = upperPluginName.replace( /\W+/g, '-' ).trim();
const upperWithUnderscore = upperPluginName.replace( /\W+/g, '_' ).trim();

// Plugin Constants.
const pluginDirPath = `${upperWithUnderscore}_FEATURES_PATH`;
const pluginDirURL = `${upperWithUnderscore}_FEATURES_URL`;

consoleOutput( fgCyan, '----------------------------------------------------' );
consoleOutput( fgGreen, 'Plugin details will be:' );

consoleOutput( fgMagenta, `Plugin name: ${pluginName}` );
consoleOutput( fgMagenta, `Plugin version: ${pluginVersion}` );
consoleOutput( fgMagenta, `Text domain: ${lowerWithHyphen}` );
consoleOutput( fgMagenta, `Package: ${pluginName}` );
consoleOutput( fgMagenta, `Namespace: ${camelCaseWithUnderscore}` );
consoleOutput( fgMagenta, `Function prefix: ${lowerPrefixWithunderscore}` );
consoleOutput( fgMagenta, `Plugin directory path: ${pluginDirPath}` );
consoleOutput( fgMagenta, `PHP directory URL: ${pluginDirURL}` );


const confirm = prompt( 'Confirm? (y/n) ' ).trim();

if ( 'y' === confirm ) {
	consoleOutput( fgGreen, 'This might take some time...' );

	findReplace( 'PROJECT_NAME_FEATURES_PATH', pluginDirPath );
	findReplace( 'PROJECT_NAME_FEATURES_URL', pluginDirURL );

	findReplace( 'PROJECT-NAME', upperWithHyphen );
	findReplace( 'PROJECT_NAME', upperWithUnderscore );

	findReplace( 'Project-Name', camelCaseWithHyphen );
	findReplace( 'Project_Name', camelCaseWithUnderscore );

	findReplace( 'project-name', lowerWithHyphen );
	findReplace( 'project_name', lowerWithUnderscore );

	if ( fs.existsSync( `${rootDir}/project-name-features.php` ) ) {

		fs.renameSync( `${rootDir}/project-name-features.php`, `${rootDir}/${lowerWithHyphen}-features.php`, ( err ) => {
			if ( err ) {
				throw err;
			}
			fs.statSync( `${rootDir}/inc/classes/class-${lowerWithHyphen}.php`, ( error, stats ) => {
				if ( error ) {
					throw error;
				}
				consoleOutput( fgBlue, `stats: ${JSON.stringify( stats )}` );
			} );
		} );

	}

	consoleOutput( fgGreen, 'Renaming Successful!' );

} else {
	consoleOutput( fgRed, 'There was error renaming.' );
}
