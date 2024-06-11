# Bypass Disabled PHP Functions

This PHP script demonstrates a method to bypass disabled PHP functions by using LD_PRELOAD and a custom shared object (`.so`) file.

## Introduction

When certain PHP functions are disabled for security reasons (e.g., `exec`, `shell_exec`, `system`), it can limit the capabilities of PHP scripts. This script provides a workaround to execute shell commands even when these functions are disabled by the server configuration.

## Features

- Bypasses disabled PHP functions to execute shell commands.
- Demonstrates the use of LD_PRELOAD to load a custom shared object file.

## Security Considerations

- **Use with Caution**: This script is for educational purposes only. Using it in production environments without proper security considerations can lead to severe vulnerabilities.
- **Regular Auditing**: Regularly audit server logs and application behavior to detect any unauthorized activities.

## Usage

1. Clone the repository: `git clone https://github.com/SadBil/bypass-Disabled_functions-PHP.git`
2. Upload both the `bypass_php.php` and `bypass_disablefunc_x64.so` files to your server directory.
3. Access the `bypass_php.ph` script via a web browser.
4. Enter a shell command into the input field and click "Execute" to execute the command.

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, feel free to open an issue or create a pull request.

## License

This project is licensed under the [MIT License](LICENSE).
