[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/abacaphiliac/compliments/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/abacaphiliac/compliments/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/abacaphiliac/compliments/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/abacaphiliac/compliments/?branch=master)
[![Build Status](https://travis-ci.org/abacaphiliac/compliments.svg?branch=master)](https://travis-ci.org/abacaphiliac/compliments)

# abacaphiliac/compliments
Compliments your sys-admins, in an effort to strengthen the developer-administrator bond.

# Installation
```bash
composer require abacaphiliac/compliments
```

# Usage
Print a random compliment:
```bash
bin/compliments random:compliment
```

Display the help message:
```bash
bin/compliments random:compliment -h
```

Override the compliments file:
```bash
bin/compliments random:compliment -f your/custom/compliments.txt
```

# Dependencies
See [composer.json](composer.json).

## Contributing
```
composer update && vendor/bin/phing
```

This library attempts to comply with [PSR-1][], [PSR-2][], and [PSR-4][]. If
you notice compliance oversights, please send a patch via pull request.

[PSR-1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
[PSR-2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[PSR-4]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md
