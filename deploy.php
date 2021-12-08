<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'perhekalenteri');

// Project repository
set('repository', 'git@github.com:xPeltsu/perhekalenteri.git');

// [Optional] Allocate tty for git clone. Default value is false.
//set('git_tty', true); 

// Shared files/dirs between deploys 
set('shared_files', []);
set('shared_dirs', []);

// Writable dirs by web server 
set('writable_dirs', []);


// Hosts

host('neutroni.hayo.fi')
    ->user('epelande')
    ->set('deploy_path', '~/public_html/{{application}}');    
    

// Tasks

desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
   // 'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
