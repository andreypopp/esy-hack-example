# esy-hack-example

This demonstrates workflow using esy with hack/hhvm.

This depends on homebrew installed version of hhvm, see `hhvm/package.json`
which exposes installation into esy environment. If you have other version
installed or you are trying this on Linux then you need to modify paths there
to adhere to your system. The idea is that won't be needed if hack/hhvm could provide some means to communicate its installation location to esy.

To try it out:

```
% npm install -g esy@next
% git clone https://github.com/andreypopp/esy-hack-example
% cd esy-hack-example
% esy install
% esy build
% esy hhvm ./main.php
```

Notice how the project is split into main package and dependency (in `./fib`
subdirectory). Currently we use `link:` to bring the dependency into project
but we could instead fetch it from npm/github/...

## How hhvm finds dependencies

1. Packages with Hack code export `$PHP_INCLUDE_PATH` environment variable
   which contain `include_path` "fragment". See `fib/package.json`.

2. `hhvm` package wraps original `hhvm` executable and adds
    ```
    -d include_path="$PHP_INCLUDE_PATH"
    ```
    to the invocation. Thus `esy hhvm` invocation sees all Hack code installed
    by Hack packages.

## TODO

- [ ] Better integration with system installed hhvm.

  We need to expose information about installed hhvm version to dependency
  solver, see https://github.com/esy/esy/issues/847 for a good proposal on that.

- [ ] Example with native code extension.
