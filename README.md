<p align="center">
    <img src="https://raw.githubusercontent.com/nexphlabs/.github/refs/heads/main/nexph-logo.png" width="220" alt="Nexph Logo">
</p>

<p align="center">
Modern PHP Runtime & Framework for Stateful Applications.
</p>


<p align="center">
    <a href="https://github.com/nexphlabs/nexph/blob/main/LICENSE"><img src="https://img.shields.io/github/license/nexphlabs/nexph" alt="License"></a>
    <a href="https://github.com/nexphlabs/nexph"><img src="https://img.shields.io/github/actions/workflow/status/nexphlabs/nexph/tests.yml" alt="Build"></a>
</p>

---

## About Nexph

Nexph is a modern PHP runtime and framework built for high-performance, stateful, and long-running applications.

It brings a runtime-first architecture to PHP, combining persistent workers, fiber-based concurrency, background processing, runtime ownership, resource tracking, cancellation, graceful drain, and built-in observability into a simple developer experience.

Inspired by Node.js flexibility, Go-style services, Rust-like ownership ideas, and the elegance of modern PHP frameworks, Nexph is designed to make PHP feel fast, modern, scalable, and safe again.

---

## Why Nexph?

Traditional PHP applications restart the lifecycle on every request.

Nexph introduces a persistent runtime architecture that enables:

- Lower latency
- Better throughput
- Reduced bootstrap overhead
- Long-running services
- Real-time applications
- Efficient async processing

All while keeping the simplicity developers love from PHP.

---

## Runtime Safety Model

Nexph is not only an HTTP framework. It is built around a modern runtime safety model inspired by systems such as Go, Rust, and structured concurrency runtimes.

Nexph introduces runtime-level primitives to make long-running PHP applications safer and easier to control.

### Ownership Model

Every important runtime execution unit can have an owner:

- HTTP request
- Fiber task
- Queue job
- Timer
- Worker
- Scheduler task
- Runtime resource

This allows Nexph to understand which task owns which resource, making cleanup and debugging much easier.

```txt
request
  └── fiber
       └── timer
            └── resource
```

### Resource Lifecycle

Resources can be tied to their owner, including:

* database connections
* Redis connections
* sockets
* file handles
* timers
* channels
* runtime tasks

When an owner is closed, Nexph can release related resources automatically.

This helps reduce common long-running process issues such as leaked connections, orphan timers, and dangling tasks.

### Cancellation & Deadline

Nexph supports cancellation and deadline primitives for runtime tasks.

This enables:

* cooperative task cancellation
* request timeout control
* queue job timeout control
* graceful worker shutdown
* deadline-aware sleep/channel operations

Instead of letting tasks run forever, Nexph gives the runtime a way to stop work safely.

### Graceful Drain

Nexph includes a centralized graceful drain mechanism.

During shutdown or reload, the runtime can:

1. stop accepting new work
2. wait for active requests/jobs/tasks
3. cancel remaining work after timeout
4. release owned resources
5. stop the worker safely

This makes Nexph suitable for persistent workers and long-running services.

### Runtime Observability

Nexph includes runtime-aware observability primitives:

* trace id
* span id
* owner id
* owner type
* worker id
* job id
* active fiber metrics
* suspended fiber tracking
* resource leak reporting
* runtime doctor checks

This makes debugging long-running PHP applications more predictable.

## Features

### Runtime Engine

- Persistent runtime architecture
- Fiber-based coroutine system
- Event loop and async task execution
- Runtime ownership model
- Resource lifecycle tracking
- Cancellation and deadline primitives
- Graceful drain and shutdown
- Worker lifecycle management
- Runtime doctor and leak reporting

### HTTP Server

- Native HTTP server
- Route groups & middleware
- Attribute-based routing
- Static file serving
- JSON-first responses

### Queue & Scheduler

- Background job processing
- Delayed tasks
- Scheduler support
- Multi-driver queue system

### Database Support

- SQLite
- MySQL
- PostgreSQL
- Redis cache support
- Connection pooling

### Developer Experience

- Minimal boilerplate
- Modern project structure
- Fast startup
- CLI tooling
- Simple APIs

---

## Installation

```bash
composer create-project nexph/nexph my-app
```

Run the development server:

```bash
cd my-app

composer run dev
```

Or manually:

```bash
cd my-app

php nexph.dev.php
```

Your application will be available at:

```txt
http://127.0.0.1:8000
```

---

## Quick Example

```php
<?php

use Nexph\App;
use Nexph\Request;

$app = App::create();

$app->get('/', function (Request $request) {
    return [
        'name' => 'Nexph',
        'message' => 'Hello World',
    ];
});

$app->listen(port: 8080);
```

---

## Attribute Routing

```php
<?php

use Nexph\Route;
use Nexph\Get;

#[Route('/api')]
class UserController
{
    #[Get('/users')]
    public function index(): array
    {
        return [
            ['id' => 1, 'name' => 'nexph'],
        ];
    }
}
```

---

## Middleware

```php
<?php

$app->middleware(function ($request, $next) {
    // Before request

    $response = $next($request);

    // After request

    return $response;
});
```

---

## Queue Example

```php
<?php

use Nexph\Queue\Queue;

Queue::push(function () {
    // Background task
});
```

---

## Project Philosophy

Nexph focuses on:

* Performance without complexity
* Modern runtime architecture
* Simple APIs
* Scalable systems
* Minimal overhead
* Excellent developer experience

We believe PHP can evolve beyond the traditional request-response lifecycle.

---

## Benchmarks

Nexph is designed with performance-first architecture:

* Fiber-based execution
* Persistent workers
* Lightweight routing
* Efficient memory usage
* Minimal bootstrap overhead

Benchmarks may vary depending on hardware and workloads.

---

## Documentation

Documentation is currently in active development.

Soon available at:

```txt
https://nexph.dev
```

---

## Contributing

Thank you for considering contributing to Nexph.

Please feel free to submit issues, discussions, and pull requests.

---

## Security Vulnerabilities

If you discover a security vulnerability within Nexph, please send an email to:

```txt
foundation@nexph.dev
```

All security vulnerabilities will be promptly addressed.

---

## License

Nexph is open-sourced software licensed under the MIT license.
