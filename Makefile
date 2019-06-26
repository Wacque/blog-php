production:
	rsync -avz --exclude-from=rsync-ignore.txt --delete ./ my:/var/www/blog-php
