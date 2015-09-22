
## Planned Utils

UriUtil (assuming $uri is scheme://user:pass@host:port/path?query=string#fragment
::getScheme($uri)               -> "scheme"
::getUser($uri)                 -> "user"
::getPassword($uri)             -> "password"
::getCredential($uri)           -> "user:password"
::getHost($uri)                 -> "host"
::getPort($uri)                 -> "port"
::getEndPoint($uri)             -> "host:port"
::getPath($uri)                 -> "/path"
::getQueryString($uri)          -> "query=string"
::getQuery($uri)                -> ["query" => "string"]
::getFragment($uri)             -> "fragment"
::parse($uri)                   -> All above in an array (cached)




