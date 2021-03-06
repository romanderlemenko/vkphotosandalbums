<?php

namespace VkPhotosAndAlbums\Models\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use VkPhotosAndAlbums\Models\Photos as ChildPhotos;
use VkPhotosAndAlbums\Models\PhotosQuery as ChildPhotosQuery;
use VkPhotosAndAlbums\Models\Map\PhotosTableMap;

/**
 * Base class that represents a query for the 'photos' table.
 *
 *
 *
 * @method     ChildPhotosQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPhotosQuery orderByAlbumId($order = Criteria::ASC) Order by the album_id column
 * @method     ChildPhotosQuery orderByOwnerId($order = Criteria::ASC) Order by the owner_id column
 * @method     ChildPhotosQuery orderByPhoto75($order = Criteria::ASC) Order by the photo_75 column
 * @method     ChildPhotosQuery orderByPhoto130($order = Criteria::ASC) Order by the photo_130 column
 * @method     ChildPhotosQuery orderByPhoto604($order = Criteria::ASC) Order by the photo_604 column
 * @method     ChildPhotosQuery orderByPhoto807($order = Criteria::ASC) Order by the photo_807 column
 * @method     ChildPhotosQuery orderByPhoto1280($order = Criteria::ASC) Order by the photo_1280 column
 * @method     ChildPhotosQuery orderByPhoto2560($order = Criteria::ASC) Order by the photo_2560 column
 * @method     ChildPhotosQuery orderByWidth($order = Criteria::ASC) Order by the width column
 * @method     ChildPhotosQuery orderByHeight($order = Criteria::ASC) Order by the height column
 * @method     ChildPhotosQuery orderByText($order = Criteria::ASC) Order by the text column
 * @method     ChildPhotosQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     ChildPhotosQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method     ChildPhotosQuery groupById() Group by the id column
 * @method     ChildPhotosQuery groupByAlbumId() Group by the album_id column
 * @method     ChildPhotosQuery groupByOwnerId() Group by the owner_id column
 * @method     ChildPhotosQuery groupByPhoto75() Group by the photo_75 column
 * @method     ChildPhotosQuery groupByPhoto130() Group by the photo_130 column
 * @method     ChildPhotosQuery groupByPhoto604() Group by the photo_604 column
 * @method     ChildPhotosQuery groupByPhoto807() Group by the photo_807 column
 * @method     ChildPhotosQuery groupByPhoto1280() Group by the photo_1280 column
 * @method     ChildPhotosQuery groupByPhoto2560() Group by the photo_2560 column
 * @method     ChildPhotosQuery groupByWidth() Group by the width column
 * @method     ChildPhotosQuery groupByHeight() Group by the height column
 * @method     ChildPhotosQuery groupByText() Group by the text column
 * @method     ChildPhotosQuery groupByCreated() Group by the created column
 * @method     ChildPhotosQuery groupByLastSync() Group by the last_sync column
 *
 * @method     ChildPhotosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPhotosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPhotosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPhotosQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPhotosQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPhotosQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPhotosQuery leftJoinUsers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Users relation
 * @method     ChildPhotosQuery rightJoinUsers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Users relation
 * @method     ChildPhotosQuery innerJoinUsers($relationAlias = null) Adds a INNER JOIN clause to the query using the Users relation
 *
 * @method     ChildPhotosQuery joinWithUsers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Users relation
 *
 * @method     ChildPhotosQuery leftJoinWithUsers() Adds a LEFT JOIN clause and with to the query using the Users relation
 * @method     ChildPhotosQuery rightJoinWithUsers() Adds a RIGHT JOIN clause and with to the query using the Users relation
 * @method     ChildPhotosQuery innerJoinWithUsers() Adds a INNER JOIN clause and with to the query using the Users relation
 *
 * @method     ChildPhotosQuery leftJoinAlbums($relationAlias = null) Adds a LEFT JOIN clause to the query using the Albums relation
 * @method     ChildPhotosQuery rightJoinAlbums($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Albums relation
 * @method     ChildPhotosQuery innerJoinAlbums($relationAlias = null) Adds a INNER JOIN clause to the query using the Albums relation
 *
 * @method     ChildPhotosQuery joinWithAlbums($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Albums relation
 *
 * @method     ChildPhotosQuery leftJoinWithAlbums() Adds a LEFT JOIN clause and with to the query using the Albums relation
 * @method     ChildPhotosQuery rightJoinWithAlbums() Adds a RIGHT JOIN clause and with to the query using the Albums relation
 * @method     ChildPhotosQuery innerJoinWithAlbums() Adds a INNER JOIN clause and with to the query using the Albums relation
 *
 * @method     \VkPhotosAndAlbums\Models\UsersQuery|\VkPhotosAndAlbums\Models\AlbumsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPhotos findOne(ConnectionInterface $con = null) Return the first ChildPhotos matching the query
 * @method     ChildPhotos findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPhotos matching the query, or a new ChildPhotos object populated from the query conditions when no match is found
 *
 * @method     ChildPhotos findOneById(int $id) Return the first ChildPhotos filtered by the id column
 * @method     ChildPhotos findOneByAlbumId(int $album_id) Return the first ChildPhotos filtered by the album_id column
 * @method     ChildPhotos findOneByOwnerId(int $owner_id) Return the first ChildPhotos filtered by the owner_id column
 * @method     ChildPhotos findOneByPhoto75(string $photo_75) Return the first ChildPhotos filtered by the photo_75 column
 * @method     ChildPhotos findOneByPhoto130(string $photo_130) Return the first ChildPhotos filtered by the photo_130 column
 * @method     ChildPhotos findOneByPhoto604(string $photo_604) Return the first ChildPhotos filtered by the photo_604 column
 * @method     ChildPhotos findOneByPhoto807(string $photo_807) Return the first ChildPhotos filtered by the photo_807 column
 * @method     ChildPhotos findOneByPhoto1280(string $photo_1280) Return the first ChildPhotos filtered by the photo_1280 column
 * @method     ChildPhotos findOneByPhoto2560(string $photo_2560) Return the first ChildPhotos filtered by the photo_2560 column
 * @method     ChildPhotos findOneByWidth(int $width) Return the first ChildPhotos filtered by the width column
 * @method     ChildPhotos findOneByHeight(int $height) Return the first ChildPhotos filtered by the height column
 * @method     ChildPhotos findOneByText(string $text) Return the first ChildPhotos filtered by the text column
 * @method     ChildPhotos findOneByCreated(string $created) Return the first ChildPhotos filtered by the created column
 * @method     ChildPhotos findOneByLastSync(string $last_sync) Return the first ChildPhotos filtered by the last_sync column *

 * @method     ChildPhotos requirePk($key, ConnectionInterface $con = null) Return the ChildPhotos by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhotos requireOne(ConnectionInterface $con = null) Return the first ChildPhotos matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPhotos requireOneById(int $id) Return the first ChildPhotos filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhotos requireOneByAlbumId(int $album_id) Return the first ChildPhotos filtered by the album_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhotos requireOneByOwnerId(int $owner_id) Return the first ChildPhotos filtered by the owner_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhotos requireOneByPhoto75(string $photo_75) Return the first ChildPhotos filtered by the photo_75 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhotos requireOneByPhoto130(string $photo_130) Return the first ChildPhotos filtered by the photo_130 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhotos requireOneByPhoto604(string $photo_604) Return the first ChildPhotos filtered by the photo_604 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhotos requireOneByPhoto807(string $photo_807) Return the first ChildPhotos filtered by the photo_807 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhotos requireOneByPhoto1280(string $photo_1280) Return the first ChildPhotos filtered by the photo_1280 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhotos requireOneByPhoto2560(string $photo_2560) Return the first ChildPhotos filtered by the photo_2560 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhotos requireOneByWidth(int $width) Return the first ChildPhotos filtered by the width column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhotos requireOneByHeight(int $height) Return the first ChildPhotos filtered by the height column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhotos requireOneByText(string $text) Return the first ChildPhotos filtered by the text column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhotos requireOneByCreated(string $created) Return the first ChildPhotos filtered by the created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhotos requireOneByLastSync(string $last_sync) Return the first ChildPhotos filtered by the last_sync column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPhotos[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPhotos objects based on current ModelCriteria
 * @method     ChildPhotos[]|ObjectCollection findById(int $id) Return ChildPhotos objects filtered by the id column
 * @method     ChildPhotos[]|ObjectCollection findByAlbumId(int $album_id) Return ChildPhotos objects filtered by the album_id column
 * @method     ChildPhotos[]|ObjectCollection findByOwnerId(int $owner_id) Return ChildPhotos objects filtered by the owner_id column
 * @method     ChildPhotos[]|ObjectCollection findByPhoto75(string $photo_75) Return ChildPhotos objects filtered by the photo_75 column
 * @method     ChildPhotos[]|ObjectCollection findByPhoto130(string $photo_130) Return ChildPhotos objects filtered by the photo_130 column
 * @method     ChildPhotos[]|ObjectCollection findByPhoto604(string $photo_604) Return ChildPhotos objects filtered by the photo_604 column
 * @method     ChildPhotos[]|ObjectCollection findByPhoto807(string $photo_807) Return ChildPhotos objects filtered by the photo_807 column
 * @method     ChildPhotos[]|ObjectCollection findByPhoto1280(string $photo_1280) Return ChildPhotos objects filtered by the photo_1280 column
 * @method     ChildPhotos[]|ObjectCollection findByPhoto2560(string $photo_2560) Return ChildPhotos objects filtered by the photo_2560 column
 * @method     ChildPhotos[]|ObjectCollection findByWidth(int $width) Return ChildPhotos objects filtered by the width column
 * @method     ChildPhotos[]|ObjectCollection findByHeight(int $height) Return ChildPhotos objects filtered by the height column
 * @method     ChildPhotos[]|ObjectCollection findByText(string $text) Return ChildPhotos objects filtered by the text column
 * @method     ChildPhotos[]|ObjectCollection findByCreated(string $created) Return ChildPhotos objects filtered by the created column
 * @method     ChildPhotos[]|ObjectCollection findByLastSync(string $last_sync) Return ChildPhotos objects filtered by the last_sync column
 * @method     ChildPhotos[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PhotosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \VkPhotosAndAlbums\Models\Base\PhotosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'vk_photos_and_albums', $modelName = '\\VkPhotosAndAlbums\\Models\\Photos', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPhotosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPhotosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPhotosQuery) {
            return $criteria;
        }
        $query = new ChildPhotosQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPhotos|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PhotosTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PhotosTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPhotos A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, album_id, owner_id, photo_75, photo_130, photo_604, photo_807, photo_1280, photo_2560, width, height, text, created, last_sync FROM photos WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildPhotos $obj */
            $obj = new ChildPhotos();
            $obj->hydrate($row);
            PhotosTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildPhotos|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildPhotosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PhotosTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPhotosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PhotosTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhotosQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PhotosTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PhotosTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhotosTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the album_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAlbumId(1234); // WHERE album_id = 1234
     * $query->filterByAlbumId(array(12, 34)); // WHERE album_id IN (12, 34)
     * $query->filterByAlbumId(array('min' => 12)); // WHERE album_id > 12
     * </code>
     *
     * @see       filterByAlbums()
     *
     * @param     mixed $albumId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhotosQuery The current query, for fluid interface
     */
    public function filterByAlbumId($albumId = null, $comparison = null)
    {
        if (is_array($albumId)) {
            $useMinMax = false;
            if (isset($albumId['min'])) {
                $this->addUsingAlias(PhotosTableMap::COL_ALBUM_ID, $albumId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($albumId['max'])) {
                $this->addUsingAlias(PhotosTableMap::COL_ALBUM_ID, $albumId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhotosTableMap::COL_ALBUM_ID, $albumId, $comparison);
    }

    /**
     * Filter the query on the owner_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOwnerId(1234); // WHERE owner_id = 1234
     * $query->filterByOwnerId(array(12, 34)); // WHERE owner_id IN (12, 34)
     * $query->filterByOwnerId(array('min' => 12)); // WHERE owner_id > 12
     * </code>
     *
     * @see       filterByUsers()
     *
     * @param     mixed $ownerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhotosQuery The current query, for fluid interface
     */
    public function filterByOwnerId($ownerId = null, $comparison = null)
    {
        if (is_array($ownerId)) {
            $useMinMax = false;
            if (isset($ownerId['min'])) {
                $this->addUsingAlias(PhotosTableMap::COL_OWNER_ID, $ownerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ownerId['max'])) {
                $this->addUsingAlias(PhotosTableMap::COL_OWNER_ID, $ownerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhotosTableMap::COL_OWNER_ID, $ownerId, $comparison);
    }

    /**
     * Filter the query on the photo_75 column
     *
     * Example usage:
     * <code>
     * $query->filterByPhoto75('fooValue');   // WHERE photo_75 = 'fooValue'
     * $query->filterByPhoto75('%fooValue%', Criteria::LIKE); // WHERE photo_75 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $photo75 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhotosQuery The current query, for fluid interface
     */
    public function filterByPhoto75($photo75 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($photo75)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhotosTableMap::COL_PHOTO_75, $photo75, $comparison);
    }

    /**
     * Filter the query on the photo_130 column
     *
     * Example usage:
     * <code>
     * $query->filterByPhoto130('fooValue');   // WHERE photo_130 = 'fooValue'
     * $query->filterByPhoto130('%fooValue%', Criteria::LIKE); // WHERE photo_130 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $photo130 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhotosQuery The current query, for fluid interface
     */
    public function filterByPhoto130($photo130 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($photo130)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhotosTableMap::COL_PHOTO_130, $photo130, $comparison);
    }

    /**
     * Filter the query on the photo_604 column
     *
     * Example usage:
     * <code>
     * $query->filterByPhoto604('fooValue');   // WHERE photo_604 = 'fooValue'
     * $query->filterByPhoto604('%fooValue%', Criteria::LIKE); // WHERE photo_604 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $photo604 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhotosQuery The current query, for fluid interface
     */
    public function filterByPhoto604($photo604 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($photo604)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhotosTableMap::COL_PHOTO_604, $photo604, $comparison);
    }

    /**
     * Filter the query on the photo_807 column
     *
     * Example usage:
     * <code>
     * $query->filterByPhoto807('fooValue');   // WHERE photo_807 = 'fooValue'
     * $query->filterByPhoto807('%fooValue%', Criteria::LIKE); // WHERE photo_807 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $photo807 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhotosQuery The current query, for fluid interface
     */
    public function filterByPhoto807($photo807 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($photo807)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhotosTableMap::COL_PHOTO_807, $photo807, $comparison);
    }

    /**
     * Filter the query on the photo_1280 column
     *
     * Example usage:
     * <code>
     * $query->filterByPhoto1280('fooValue');   // WHERE photo_1280 = 'fooValue'
     * $query->filterByPhoto1280('%fooValue%', Criteria::LIKE); // WHERE photo_1280 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $photo1280 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhotosQuery The current query, for fluid interface
     */
    public function filterByPhoto1280($photo1280 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($photo1280)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhotosTableMap::COL_PHOTO_1280, $photo1280, $comparison);
    }

    /**
     * Filter the query on the photo_2560 column
     *
     * Example usage:
     * <code>
     * $query->filterByPhoto2560('fooValue');   // WHERE photo_2560 = 'fooValue'
     * $query->filterByPhoto2560('%fooValue%', Criteria::LIKE); // WHERE photo_2560 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $photo2560 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhotosQuery The current query, for fluid interface
     */
    public function filterByPhoto2560($photo2560 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($photo2560)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhotosTableMap::COL_PHOTO_2560, $photo2560, $comparison);
    }

    /**
     * Filter the query on the width column
     *
     * Example usage:
     * <code>
     * $query->filterByWidth(1234); // WHERE width = 1234
     * $query->filterByWidth(array(12, 34)); // WHERE width IN (12, 34)
     * $query->filterByWidth(array('min' => 12)); // WHERE width > 12
     * </code>
     *
     * @param     mixed $width The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhotosQuery The current query, for fluid interface
     */
    public function filterByWidth($width = null, $comparison = null)
    {
        if (is_array($width)) {
            $useMinMax = false;
            if (isset($width['min'])) {
                $this->addUsingAlias(PhotosTableMap::COL_WIDTH, $width['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($width['max'])) {
                $this->addUsingAlias(PhotosTableMap::COL_WIDTH, $width['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhotosTableMap::COL_WIDTH, $width, $comparison);
    }

    /**
     * Filter the query on the height column
     *
     * Example usage:
     * <code>
     * $query->filterByHeight(1234); // WHERE height = 1234
     * $query->filterByHeight(array(12, 34)); // WHERE height IN (12, 34)
     * $query->filterByHeight(array('min' => 12)); // WHERE height > 12
     * </code>
     *
     * @param     mixed $height The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhotosQuery The current query, for fluid interface
     */
    public function filterByHeight($height = null, $comparison = null)
    {
        if (is_array($height)) {
            $useMinMax = false;
            if (isset($height['min'])) {
                $this->addUsingAlias(PhotosTableMap::COL_HEIGHT, $height['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($height['max'])) {
                $this->addUsingAlias(PhotosTableMap::COL_HEIGHT, $height['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhotosTableMap::COL_HEIGHT, $height, $comparison);
    }

    /**
     * Filter the query on the text column
     *
     * Example usage:
     * <code>
     * $query->filterByText('fooValue');   // WHERE text = 'fooValue'
     * $query->filterByText('%fooValue%', Criteria::LIKE); // WHERE text LIKE '%fooValue%'
     * </code>
     *
     * @param     string $text The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhotosQuery The current query, for fluid interface
     */
    public function filterByText($text = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($text)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhotosTableMap::COL_TEXT, $text, $comparison);
    }

    /**
     * Filter the query on the created column
     *
     * Example usage:
     * <code>
     * $query->filterByCreated('2011-03-14'); // WHERE created = '2011-03-14'
     * $query->filterByCreated('now'); // WHERE created = '2011-03-14'
     * $query->filterByCreated(array('max' => 'yesterday')); // WHERE created > '2011-03-13'
     * </code>
     *
     * @param     mixed $created The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhotosQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(PhotosTableMap::COL_CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(PhotosTableMap::COL_CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhotosTableMap::COL_CREATED, $created, $comparison);
    }

    /**
     * Filter the query on the last_sync column
     *
     * Example usage:
     * <code>
     * $query->filterByLastSync('2011-03-14'); // WHERE last_sync = '2011-03-14'
     * $query->filterByLastSync('now'); // WHERE last_sync = '2011-03-14'
     * $query->filterByLastSync(array('max' => 'yesterday')); // WHERE last_sync > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastSync The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhotosQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(PhotosTableMap::COL_LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(PhotosTableMap::COL_LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhotosTableMap::COL_LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related \VkPhotosAndAlbums\Models\Users object
     *
     * @param \VkPhotosAndAlbums\Models\Users|ObjectCollection $users The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPhotosQuery The current query, for fluid interface
     */
    public function filterByUsers($users, $comparison = null)
    {
        if ($users instanceof \VkPhotosAndAlbums\Models\Users) {
            return $this
                ->addUsingAlias(PhotosTableMap::COL_OWNER_ID, $users->getId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PhotosTableMap::COL_OWNER_ID, $users->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUsers() only accepts arguments of type \VkPhotosAndAlbums\Models\Users or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Users relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhotosQuery The current query, for fluid interface
     */
    public function joinUsers($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Users');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Users');
        }

        return $this;
    }

    /**
     * Use the Users relation Users object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \VkPhotosAndAlbums\Models\UsersQuery A secondary query class using the current class as primary query
     */
    public function useUsersQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUsers($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Users', '\VkPhotosAndAlbums\Models\UsersQuery');
    }

    /**
     * Filter the query by a related \VkPhotosAndAlbums\Models\Albums object
     *
     * @param \VkPhotosAndAlbums\Models\Albums|ObjectCollection $albums The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPhotosQuery The current query, for fluid interface
     */
    public function filterByAlbums($albums, $comparison = null)
    {
        if ($albums instanceof \VkPhotosAndAlbums\Models\Albums) {
            return $this
                ->addUsingAlias(PhotosTableMap::COL_ALBUM_ID, $albums->getId(), $comparison);
        } elseif ($albums instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PhotosTableMap::COL_ALBUM_ID, $albums->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAlbums() only accepts arguments of type \VkPhotosAndAlbums\Models\Albums or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Albums relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhotosQuery The current query, for fluid interface
     */
    public function joinAlbums($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Albums');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Albums');
        }

        return $this;
    }

    /**
     * Use the Albums relation Albums object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \VkPhotosAndAlbums\Models\AlbumsQuery A secondary query class using the current class as primary query
     */
    public function useAlbumsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAlbums($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Albums', '\VkPhotosAndAlbums\Models\AlbumsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPhotos $photos Object to remove from the list of results
     *
     * @return $this|ChildPhotosQuery The current query, for fluid interface
     */
    public function prune($photos = null)
    {
        if ($photos) {
            $this->addUsingAlias(PhotosTableMap::COL_ID, $photos->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the photos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PhotosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PhotosTableMap::clearInstancePool();
            PhotosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PhotosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PhotosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PhotosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PhotosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PhotosQuery
