<?php

namespace vinicinbgs\Autentique\Utils;

use Exception;

class Query
{
    const DIR = "queries/";

    /** @var string */
    protected $resource;

    /**
     * Query constructor.
     * @param string $resource
     */
    public function __construct(string $resource)
    {
        $this->resource = rtrim(__DIR__ . "/../" . self::DIR . strtolower($resource), '/');
    }

    /**
     * Get query
     *
     * @param string $file
     * @return string|null
     * @throws Exception
     */
    public function query(string $file): ?string
    {
        $filePath = "{$this->resource}/$file";

        if (empty($file) || !file_exists($filePath)) {
            throw new Exception("File '$file' is not found", 404);
        }

        $query = file_get_contents($filePath);

        if ($query === false) {
            throw new Exception("Unable to read the file '$file'", 500);
        }

        return $this->formatQueryRemoveBrokenLine($query);
    }

    /**
     * Format query to remove LF (line feed \n) and CR (carriage return \r)
     *
     * @param string $query
     * @return string|null
     */
    private function formatQueryRemoveBrokenLine(string $query): ?string
    {
        return preg_replace("/[\n\r]/", "", $query);
    }

    /**
     * Set variables in query by adding values
     *
     * @param string|array $variables
     * @param string|array $value
     * @param string $graphQuery
     * @return string
     */
    public function setVariables($variables, $value, string $graphQuery): string
    {
        if (is_array($variables) && is_array($value)) {
            $variablesLength = count($variables);

            if ($variablesLength !== count($value)) {
                throw new Exception("Mismatched variables and values count", 400);
            }

            for ($i = 0; $i < $variablesLength; $i++) {
                $variable = "\$" . $variables[$i];
                $graphQuery = str_replace($variable, $value[$i], $graphQuery);
            }
        } elseif (is_string($variables)) {
            $graphQuery = str_replace("\$" . $variables, $value, $graphQuery);
        } else {
            throw new Exception("Invalid variables or values provided", 400);
        }

        return $graphQuery;
    }
}
