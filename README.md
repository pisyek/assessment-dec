# Technical Assessment

My answer

## Description

Question

1) A php-fpm config can limit a script to certain memory usage using memory_limit key. However, it only limits per script execution. Write a solution that can limit memory usage for each php-fpm pool.
2) One system user is uploading a lot of files to a server (either through SFTP or web based file upload). A system administrator who took care of this server hated this behavior because that user can upload files until the disk filled up. Write a solution (config file, bash script) to limit this system user from using more than 10GB of disk storage.
3) Using solutions in #1 and #2, automate this process using Go (golang) for each php-fpm pool (#1) and for each user (#2). This Go binary will be running inside a Ubuntu Server 20.04 LTS as agent. Use exec.Command() as little as possible.
4) Forget about authentication, scaffolding and UI, write A Laravel system (a command center) that can communicate with Go code (agent) in #3 (either using HTTP (REST API) or messaging protocol). It can pass the value of memory to be limited by a php-fpm pool and pass the value of storage limit for a system user to that Go code.

## Answer

### Question 1
memory-limit.sh will take four args:
```
./memory-limit.sh <memory_limit size in MB> </path/to/php/conf.dir> <max php-fpm child number> </path/to/php/fpm/www.conf>
```

### Question 2
storage-limit.sh will take two args:
```
./storage-limit.sh <user name> <size limit in GB>
```

### Question 3
.


### Question 4
Laravel app to call GO REST API