<?php

namespace Tests\Support\Fixtures;

class CreateTablePayloads
{

    /**
     * @throws \JsonException
     */
    public static function simpleTable(): array
    {
        $content = <<<EOT
        {
          "name": "expenses",
          "oldName": "New Table",
          "columns": [
            {
              "name": "id",
              "type": {
                "name": "integer",
                "category": "Numbers",
                "default": {
                  "type": "number",
                  "step": "any"
                }
              },
              "default": null,
              "notnull": true,
              "length": null,
              "precision": 10,
              "scale": 0,
              "fixed": false,
              "unsigned": true,
              "autoincrement": true,
              "columnDefinition": null,
              "comment": null,
              "oldName": "id",
              "null": "NO",
              "extra": "auto_increment",
              "composite": false
            },
            {
              "name": "description",
              "oldName": "",
              "type": {
                "name": "text",
                "category": "Strings"
              },
              "length": null,
              "fixed": false,
              "unsigned": false,
              "autoincrement": false,
              "notnull": false,
              "default": null
            },
            {
              "name": "amount",
              "oldName": "",
              "type": {
                "name": "numeric",
                "category": "Numbers",
                "default": {
                  "type": "number",
                  "step": "any"
                }
              },
              "length": "",
              "fixed": false,
              "unsigned": false,
              "autoincrement": false,
              "notnull": false,
              "default": null
            }
          ],
          "indexes": [
            {
              "name": "primary",
              "oldName": "primary",
              "columns": [
                "id"
              ],
              "type": "PRIMARY",
              "isPrimary": true,
              "isUnique": true,
              "isComposite": false,
              "flags": [],
              "options": [],
              "table": "expenses"
            }
          ],
          "primaryKeyName": "primary",
          "foreignKeys": [],
          "options": {
            "create_options": []
          }
        }
        EOT;

        return json_decode($content, true, flags: JSON_THROW_ON_ERROR);
    }
}
