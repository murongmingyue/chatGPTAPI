# chatGPTAPI
chatGPT-3.5-API

### Installation

To install PHP chatGPT API Class, run the following command:

```

composer require murongmingyue/chatgptturboapi 

```

### How to Use:

```php

use murongmingyue/chatgptturboapi;

$appKey = env('Your chatGPT AppKey');

$chatApi = new chatApi($appKey);

$content = 'Hello!';

$response = $chatApi->chatApi($content);

var_dump($response);

```



