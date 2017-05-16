#!/usr/bin/env bash
txtund=$(tput sgr 0 1)          # Underline
txtbld=$(tput bold)             # Bold
grn=$(tput setaf 2)             # Green
red=$(tput setaf 1)             # Red
bldgrn=${txtbld}$(tput setaf 2) # Bold Green
bldred=${txtbld}$(tput setaf 1) # Bold Red
txtrst=$(tput sgr0)             # Reset


script_directory=$(dirname $0)
script_name=$(basename $0)
working_directory=`pwd`

echo_line() {
        echo
        echo "${bldred}====================================================================================================>${txtrst}"
        echo
}

echo_message () {
        echo "${bldgrn}[$script_name]${txtrst} ${grn}$*${txtrst}"
}

echo_message "Building Toomby Theme for Distribution"

cd "$working_directory/$script_directory/static"

echo_message "Running NPM Install"
npm install

echo_line
echo_message "Running Bower Install"
bower install

echo_line
echo_message "Building SASS and Javascript dependencies"
npm run dist

echo_line
echo_message "Bundling Theme into ZIP"
cd "$working_directory/$script_directory/themes"
zip -r toomby{.zip,}

echo_message "Moving ZIP to $working_directory"
mv "$working_directory/$script_directory/themes/toomby.zip" "$working_directory/"

