/**
 * Скрипт для автоматического обновления версий в различных файлах темы
 * 
 * Использование:
 * node update-versions.js [patch|minor|major]
 * 
 * patch - увеличивает третье число (2.1.3 -> 2.1.4)
 * minor - увеличивает второе число и сбрасывает третье (2.1.3 -> 2.2.0)
 * major - увеличивает первое число и сбрасывает остальные (2.1.3 -> 3.0.0)
 */

import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

// Получаем директорию, где находится скрипт
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
const rootDir = path.resolve(__dirname, '..');

// Файлы для обновления версий
const files = {
  packageJson: path.join(rootDir, 'package.json'),
  styleCss: path.join(rootDir, 'style.css'),
  viteIntegration: path.join(rootDir, 'inc/rshop-vite-integration.php'),
  stylesAndScripts: path.join(rootDir, 'inc/rshop-styles-and-scripts.php')
};

// Получаем тип обновления версии из аргументов командной строки
const updateType = process.argv[2] || 'patch';
if (!['patch', 'minor', 'major'].includes(updateType)) {
  console.error('Неверный тип обновления. Используйте: patch, minor или major');
  process.exit(1);
}

// Функция для получения текущей версии из package.json
function getCurrentVersion() {
  const packageJson = JSON.parse(fs.readFileSync(files.packageJson, 'utf8'));
  return packageJson.version;
}

// Функция для вычисления новой версии
function getNewVersion(currentVersion, type) {
  const parts = currentVersion.split('.').map(Number);
  
  switch (type) {
    case 'major':
      return `${parts[0] + 1}.0.0`;
    case 'minor':
      return `${parts[0]}.${parts[1] + 1}.0`;
    case 'patch':
    default:
      return `${parts[0]}.${parts[1]}.${parts[2] + 1}`;
  }
}

// Функция для обновления версии в package.json
function updatePackageJson(newVersion) {
  const content = JSON.parse(fs.readFileSync(files.packageJson, 'utf8'));
  content.version = newVersion;
  fs.writeFileSync(files.packageJson, JSON.stringify(content, null, 2) + '\n');
  console.log(`Обновлена версия в package.json: ${newVersion}`);
}

// Функция для обновления версии в style.css
function updateStyleCss(newVersion) {
  let content = fs.readFileSync(files.styleCss, 'utf8');
  content = content.replace(
    /Version:\s*\d+\.\d+\.\d+/,
    `Version:      	${newVersion}`
  );
  fs.writeFileSync(files.styleCss, content);
  console.log(`Обновлена версия в style.css: ${newVersion}`);
}

// Функция для обновления версии в PHP-файлах
function updatePhpFiles(newVersion) {
  // Используем полную версию темы для JS-файлов
  const jsVersion = newVersion;
  
  // Обновляем в файле rshop-vite-integration.php
  let content = fs.readFileSync(files.viteIntegration, 'utf8');
  content = content.replace(
    /'child-style'[\s\S]+?'([^']+)'/,
    (match) => match.replace(/'([^']+)'/, `'${jsVersion}'`)
  );
  content = content.replace(
    /'child-scripts'[\s\S]+?'([^']+)'/,
    (match) => match.replace(/'([^']+)'/, `'${jsVersion}'`)
  );
  fs.writeFileSync(files.viteIntegration, content);
  console.log(`Обновлена версия в rshop-vite-integration.php: ${jsVersion}`);
  
  // Обновляем в файле rshop-styles-and-scripts.php
  content = fs.readFileSync(files.stylesAndScripts, 'utf8');
  content = content.replace(
    /'child-scripts'[\s\S]+?'([^']+)'/,
    (match) => match.replace(/'([^']+)'/, `'${jsVersion}'`)
  );
  fs.writeFileSync(files.stylesAndScripts, content);
  console.log(`Обновлена версия в rshop-styles-and-scripts.php: ${jsVersion}`);
}

// Основная функция
function main() {
  try {
    const currentVersion = getCurrentVersion();
    const newVersion = getNewVersion(currentVersion, updateType);
    
    console.log(`🔄 Обновление версии: ${currentVersion} -> ${newVersion}`);
    
    updatePackageJson(newVersion);
    updateStyleCss(newVersion);
    updatePhpFiles(newVersion);
    
    console.log('Все версии успешно обновлены!');
  } catch (error) {
    console.error('Ошибка при обновлении версий:', error);
    process.exit(1);
  }
}

main(); 