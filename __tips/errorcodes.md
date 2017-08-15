# 1xx Informational Error Code List
This class of status code means a temporary response, consisting notably of the Status-Line and optional headers, and is eliminated by an empty line.
Since HTTP/1.0 did not specify any 1xx status codes, servers must not[note 1] transfer a 1xx response to an HTTP/1.0 client but under experimental circumstances.

1. HTTP Error Code 100 Continue
2. HTTP Error Code 101 Switching Protocols
3. HTTP Error Code 102 Processing

# 2xx Success Error Code List
This class of status codes means the action asked by the client was accepted, understood and processed successfully.

4. 200 – OK
5. 201 – Created
6. 202 – Accepted
7. 203 – Non-Authoritative Information (since HTTP/1.1)
8. 204 – No Content
9. 205 – Reset Content
10. 206 – Partial Content (RFC 7233)
11. 207 – Multi-Status (WebDAV; RFC 4918)
12. 208 – Already Reported (WebDAV; RFC 5842)
13. 226 – IM Used (RFC 3229)

# 3xx Redirection Error Code List
This class of status code means the client must take extra action to complete the request. Several of these status codes used in URL redirection. A user agent may carry out the further action with no user interaction only if the system utilised in the second request is GET or HEAD. A user may automatically redirect a request. A user agent should detect and interrupt to prevent cyclical redirects.

14. 300 – Multiple Choices
15. 301 – Moved Permanently
16. 302 – Found
17. 303 – Check Other (since HTTP/1.1)
18. 304 – Not Modified (RFC 7232)
19. 305 – Use Proxy (since HTTP/1.1)
20. 306 – Switch Proxy
21. 307 – Temporary Redirect (since HTTP/1.1)
22. 308 – Permanent Redirect (RFC 7538)

# 4xx Client Error Code List
This class of status code is reserved for conditions in which the client seems to have erred.

23. 400 – Bad Request
24. 401 – Unauthorised (RFC 7235)
25. 402 – Payment Required
26. 403 – Forbidden
27. 404 – Not Found
28. 405 – Method Not Allowed
29. 406 – Not Acceptable
30. 407 – Proxy Authentication Required (RFC 7235)
31. 408 – Request Timeout
32. 409 – Conflict
33. 410 – Gone
34. 411 – Length Required
35. 412 – Precondition Failed (RFC 7232)
36. 413 – Payload Too Large (RFC 7231)
37. 414 – URI Too Long (RFC 7231)
38. 415 – Unsupported Media Type
39. 416 – Range Not Satisfiable (RFC 7233)
40. 417 – Expectation Failed
41. 418 – I’m a teapot (RFC 2324)
42. 421 – Misdirected Request (RFC 7540)
43. 422 – Unprocessable Entity (WebDAV; RFC 4918)
44. 423 – Locked (WebDAV; RFC 4918)
45. 424 – Failed Dependency (WebDAV; RFC 4918)
46. 426 – Upgrade Required
47. 428 – Precondition Required (RFC 6585)
48. 429 – Too Many Requests (RFC 6585)
49. 431 – Request Header Fields Too Large (RFC 6585)
50. 451 – Unavailable For Legal Reasons

# 5xx Server Error Code List
The server failed to fulfil a possibly valid request. These response codes apply to any request method.

51. 500 – Internal Server Error
52. 501 – Not Implemented
53. 502 – Bad Gateway
54. 503 – Service Unavailable
55. 504 – Gateway Timeout
56. 505 – HTTP Version Not Supported
57. 506 – Variant Also Negotiates (RFC 2295)
58. 507 – Insufficient Storage (WebDAV; RFC 4918)
59. 508 – Loop Detected (WebDAV; RFC 5842)
60. 510 – Not Extended (RFC 2774)
61. 511 – Network Authentication Required (RFC 6585)

# Unofficial Error Code List
These codes are not defined in any RFC but are used by 3rd-party services to provide RESTful error responses.

62. 103 – Checkpoint
63. 420 – Method Failure (Spring Framework)
64. 420 – Enhance Your Calm (Twitter)
65. 450 – Blocked by Windows Parental Controls (Microsoft)
66. 498 – Invalid Token (Esri)
67. 499 – Token Required (Esri)
68. 499 – Request forbidden by antivirus
69. 509 – Bandwidth Limit Exceeded (Apache Web Server/cPanel)
70. 530 – Site is frozen

# Internet Information Services Error Code List
IIS expands 4xx error space to signal errors.

71. 449 – Retry With
72. 451 – Redirect
73. 444 – No Response

# Nginx Error Code List
The nginx web server software extends the 4xx error space to indicate issues with the client’s request. These codes used for only logging purposes. No actual response is sent with these codes.

74. 495 – SSL Certificate Error
75. 496 – SSL Certificate Required
76. 497 – HTTP Request Sent to HTTPS Port
77. 499 – Client Closed Request

# CloudFlare Error Code List
CloudFlare’s reverse proxy service expands the 5xx series of errors space to signal issues with the origin server.

78. 520 – Unknown Error
79. 521 – Web Server Is Down
80. 522 – Connection Timed Out
81. 523 – Origin Is Unreachable
82. 524 – A Timeout Occurred
83. 525 – SSL Handshake Failed
84. 526 – Invalid SSL Certificate
