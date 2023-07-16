const path = require("path");
const fs = require("fs");
const archiver = require('archiver');

const rootPath = path.join(__dirname, "..");
const distPath = path.join(rootPath, "dist");
const getAndIncreaseBuildNumber = () => {
    let buildNumber;
    const buildNumberPath = path.join(distPath, "buildNumber.txt");
    if (!fs.existsSync(buildNumberPath)) {
        buildNumber = 1;
    } else {
        buildNumber = parseInt(fs.readFileSync(buildNumberPath).toString().trim()) + 1;
    }

    fs.writeFileSync(buildNumberPath, buildNumber.toString());
    return buildNumber;
}


(async () => {
    if (!fs.existsSync(distPath)) {
        console.log(`Creating directory ${distPath}.`);
        fs.mkdirSync(distPath);
    }

    const buildNumber = getAndIncreaseBuildNumber();
    const date = new Date();
    const version = `${date.getFullYear()}.${date.getMonth() + 1}.${date.getDay()}.${buildNumber}`;
    console.log(`Version: ${version}`);

    // Read and parse build info
    const buildInfoPath = path.join(rootPath, "buildInfo.json");
    const buildInfo = JSON.parse(fs.readFileSync(buildInfoPath).toString());
    const styleCss = `/*
Theme Name: ${buildInfo.themeName}
Author: ${buildInfo.author}
Author URI: ${buildInfo.authorUri}
Version: ${version}
Text Domain: ${buildInfo.textDomain}
*/`

    // Create ZIP file
    const zipFileLocation = path.join(distPath, `${buildInfo.prefix}.zip`);
    // create a file to stream archive data to.
    const output = fs.createWriteStream(zipFileLocation);
    const archive = archiver('zip', {
        zlib: {level: 9} // Sets the compression level.
    });

    output.on('close', function () {
        console.log(archive.pointer() + ' total bytes');
        console.log('archiver has been finalized and the output file descriptor has closed.');
    });

    output.on('end', function () {
        console.log('Data has been drained');
    });

    archive.on('warning', function (err) {
        if (err.code === 'ENOENT') {
            // log warning
        } else {
            // throw error
            throw err;
        }
    });

    archive.on('error', function (err) {
        throw err;
    });

    archive.pipe(output);

    const excludedFolders = ["assets", "build", "dist", "node_modules"];
    const directories = fs.readdirSync(rootPath)
        .filter(d => fs.lstatSync(path.join(rootPath, d)).isDirectory())
        .filter(d => !excludedFolders.includes(d));
    for (const directory of directories) {
        archive.directory(path.join(rootPath, directory), directory);
    }

    archive.glob('*.+(php|jpg)', {cwd: rootPath});
    archive.append(Buffer.from(styleCss), {name: "style.css"});
    archive.finalize();
})()
    .then(() => console.log("Done building"))
    .catch((e) => {
        console.error(e);
        process.exit(1);
    });