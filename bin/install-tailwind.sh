#!/usr/bin/env sh
# Baixa o binário standalone do Tailwind (não versionado: tem mais de 100 MB).
set -e
cd "$(dirname "$0")"
curl -fsSL -o tailwindcss https://github.com/tailwindlabs/tailwindcss/releases/download/v4.1.11/tailwindcss-linux-x64
chmod +x tailwindcss
echo "tailwindcss instalado em bin/tailwindcss — rode: composer css"
