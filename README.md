# Shopify Micro Framework (PHP)

A minimal PHP micro-framework for Shopify API integration.

## Setup

1. Copy `.env.example` to `.env` and fill in your Shopify credentials.
2. Install dependencies:

   ```bash
   composer install
   ```

3. Start the PHP server:

   ```bash
   php -S localhost:8000 -t public
   ```

4. Test your setup: [http://localhost:8000/shopify/shop](http://localhost:8000/shopify/shop)

## Structure

- `public/index.php` — Main router and entrypoint
- `src/Shopify.php` — Shopify API integration
- `.env.example` — Example environment variables

## License

MIT
