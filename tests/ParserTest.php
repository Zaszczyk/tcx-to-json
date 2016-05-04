<?php
use MateuszBlaszczyk\TcxToJson\Parser;

/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 25.04.2016
 * Time: 00:08
 */
class ParserTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->getXml1();
    }

    public function getJson()
    {
        $parser = new Parser($this->getXml1());
        $results = $parser->getJson();
        $this->assertJson($results);
    }

    /**
     * @group xml1
     */
    public function testParseXml1()
    {
        $parser = new Parser($this->getXml1());
        $results = $parser->parse();
        $this->assertEquals(34, count($results));

        foreach ($results as $r) {
            $this->assertEquals(5, count($r));
        }

        $this->assertArraySubset([
            'latitude' => '51.772699',
            'longitude' => '19.422868',
            'altitude' => '202.18',
            'distance' => '0.0',
            'timestamp' => '0'
        ], $results[0]);

        $this->assertArraySubset([
            'latitude' => '51.772699',
            'longitude' => '19.422868',
            'altitude' => '202.18',
            'distance' => '0.0',
            'timestamp' => '5'
        ], $results[1]);

        $this->assertArraySubset([
            'latitude' => '51.772670',
            'longitude' => '19.422824',
            'altitude' => '202.09',
            'distance' => '0.00439',
            'timestamp' => '10'
        ], $results[2]);
    }


    public function testParseXml2()
    {
        $parser = new Parser($this->getXml2());
        $results = $parser->parse();
        $this->assertEquals(36, count($results));

        foreach ($results as $r) {
            $this->assertEquals(5, count($r));
        }

        $this->assertArraySubset([
            'latitude' => '51.772656',
            'longitude' => '19.422962',
            'altitude' => '284.01',
            'distance' => '0.0',
            'timestamp' => '0'
        ], $results[0]);

        $this->assertArraySubset([
            'latitude' => '51.772656',
            'longitude' => '19.422962',
            'altitude' => '284.01',
            'distance' => '0.0',
            'timestamp' => '5'
        ], $results[1]);

        $this->assertArraySubset([
            'latitude' => '51.772656',
            'longitude' => '19.422962',
            'altitude' => '284.01',
            'distance' => '0.0',
            'timestamp' => '9'
        ], $results[2]);

        $this->assertArraySubset([
            'latitude' => '51.772942',
            'longitude' => '19.422948',
            'altitude' => '193.75',
            'distance' => '0.36918',
            'timestamp' => '45'
        ], $results[35]);
    }

    public function getXml1()
    {
        return '<TrainingCenterDatabase xmlns="http://www.garmin.com/xmlschemas/TrainingCenterDatabase/v2">
  <Activities>
    <Activity Sport="Other">
      <Id>2016-04-24T22:28:38.188+02:00</Id>
      <Lap StartTime="2016-04-24T22:28:38.188+02:00">
        <TotalTimeSeconds>85.256</TotalTimeSeconds>
        <DistanceMeters>15.598214218403982</DistanceMeters>
        <Calories>1</Calories>
        <Intensity>Active</Intensity>
        <TriggerMethod>Manual</TriggerMethod>
        <Track>
          <Trackpoint>
            <Time>2016-04-24T22:28:38.188+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77269923686981</LatitudeDegrees>
              <LongitudeDegrees>19.422868251800537</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.18</AltitudeMeters>
            <DistanceMeters>0.0</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:28:43.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77269923686981</LatitudeDegrees>
              <LongitudeDegrees>19.422868251800537</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.18</AltitudeMeters>
            <DistanceMeters>0.0</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:28:48.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.772670200892854</LatitudeDegrees>
              <LongitudeDegrees>19.422824995858328</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.08714285714288</AltitudeMeters>
            <DistanceMeters>4.391163234983726</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:28:50.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.772658586502075</LatitudeDegrees>
              <LongitudeDegrees>19.422807693481445</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.05</AltitudeMeters>
            <DistanceMeters>6.147628891953243</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:28:55.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.772670904795326</LatitudeDegrees>
              <LongitudeDegrees>19.422843555609386</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.00833333333333</AltitudeMeters>
            <DistanceMeters>8.969829090263627</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:28:56.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267336845398</LatitudeDegrees>
              <LongitudeDegrees>19.422850728034973</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>9.534269059331976</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:01.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.7726729048623</LatitudeDegrees>
              <LongitudeDegrees>19.422850529352825</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>9.587600040266961</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:05.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267253398895</LatitudeDegrees>
              <LongitudeDegrees>19.422850370407104</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>9.630264824925723</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:07.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.772658586502075</LatitudeDegrees>
              <LongitudeDegrees>19.42282807826996</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>11.811522893471507</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:12.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77265825536516</LatitudeDegrees>
              <LongitudeDegrees>19.42282787958781</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>11.850799514942711</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:16.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77265799045563</LatitudeDegrees>
              <LongitudeDegrees>19.42282772064209</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>11.882220811899584</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:21.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.772661512548275</LatitudeDegrees>
              <LongitudeDegrees>19.422834466804158</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>12.489542118364234</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:26.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77266503464092</LatitudeDegrees>
              <LongitudeDegrees>19.422841212966226</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>13.096863397142682</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:31.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.772668556733564</LatitudeDegrees>
              <LongitudeDegrees>19.422847959128294</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>13.704184647725427</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:36.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267207882621</LatitudeDegrees>
              <LongitudeDegrees>19.422854705290362</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>14.31150587113147</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:38.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267348766327</LatitudeDegrees>
              <LongitudeDegrees>19.422857403755188</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>14.554434352565119</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:43.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267322275374</LatitudeDegrees>
              <LongitudeDegrees>19.422857271300423</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>14.585268621401651</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:47.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267301082611</LatitudeDegrees>
              <LongitudeDegrees>19.42285716533661</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>14.609936036813076</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:48.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>201.91</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:49.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>201.92</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:50.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>201.93</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:51.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>201.94</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:52.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>201.94</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:53.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>201.96</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:54.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>201.96</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:55.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>201.97</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:56.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>201.98</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:57.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>201.99</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:58.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:59.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.01</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:30:00.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.01</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:30:01.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.02</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:30:02.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.03</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:30:03.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.04</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
        </Track>
      </Lap>
      <Creator xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:type="Device_t">
        <Name>Fitbit iPhone App</Name>
        <UnitId>0</UnitId>
        <ProductID>0</ProductID>
      </Creator>
    </Activity>
  </Activities>
</TrainingCenterDatabase>';
    }

    public function getXml2()
    {
        return '<?xml version="1.0" encoding="UTF-8"?>
<TrainingCenterDatabase xmlns="http://www.garmin.com/xmlschemas/TrainingCenterDatabase/v2">
  <Activities>
    <Activity Sport="Other">
      <Id>2016-04-18T20:38:03.000+02:00</Id>
      <Lap StartTime="2016-04-18T20:38:03.000+02:00">
        <TotalTimeSeconds>45.0</TotalTimeSeconds>
        <DistanceMeters>369.1780076306614</DistanceMeters>
        <Calories>0</Calories>
        <Intensity>Active</Intensity>
        <TriggerMethod>Manual</TriggerMethod>
        <Track>
          <Trackpoint>
            <Time>2016-04-18T20:38:03.453+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77265644073486</LatitudeDegrees>
              <LongitudeDegrees>19.422962069511414</LongitudeDegrees>
            </Position>
            <AltitudeMeters>284.01</AltitudeMeters>
            <DistanceMeters>0.0</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:08.453+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77265644073486</LatitudeDegrees>
              <LongitudeDegrees>19.422962069511414</LongitudeDegrees>
            </Position>
            <AltitudeMeters>284.01</AltitudeMeters>
            <DistanceMeters>0.0</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:12.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77265644073486</LatitudeDegrees>
              <LongitudeDegrees>19.422962069511414</LongitudeDegrees>
            </Position>
            <AltitudeMeters>284.01</AltitudeMeters>
            <DistanceMeters>0.0</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:13.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.772791504859924</LatitudeDegrees>
              <LongitudeDegrees>19.422786474227905</LongitudeDegrees>
            </Position>
            <AltitudeMeters>264.54</AltitudeMeters>
            <DistanceMeters>19.275050087151005</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:15.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77303981781006</LatitudeDegrees>
              <LongitudeDegrees>19.42283606529236</LongitudeDegrees>
            </Position>
            <AltitudeMeters>248.41</AltitudeMeters>
            <DistanceMeters>47.09626632445327</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:16.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.773022413253784</LatitudeDegrees>
              <LongitudeDegrees>19.42304515838623</LongitudeDegrees>
            </Position>
            <AltitudeMeters>243.86</AltitudeMeters>
            <DistanceMeters>61.612524304133736</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:17.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.7730278968811</LatitudeDegrees>
              <LongitudeDegrees>19.422826647758484</LongitudeDegrees>
            </Position>
            <AltitudeMeters>178.03</AltitudeMeters>
            <DistanceMeters>76.65953314784143</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:18.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77313315868378</LatitudeDegrees>
              <LongitudeDegrees>19.422770738601685</LongitudeDegrees>
            </Position>
            <AltitudeMeters>145.65</AltitudeMeters>
            <DistanceMeters>88.98007280753944</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:19.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77302587032318</LatitudeDegrees>
              <LongitudeDegrees>19.422834157943726</LongitudeDegrees>
            </Position>
            <AltitudeMeters>179.88</AltitudeMeters>
            <DistanceMeters>101.68299427938449</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:20.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.772918581962585</LatitudeDegrees>
              <LongitudeDegrees>19.42273199558258</LongitudeDegrees>
            </Position>
            <AltitudeMeters>163.55</AltitudeMeters>
            <DistanceMeters>115.52981880385963</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:21.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77301502227783</LatitudeDegrees>
              <LongitudeDegrees>19.422800064086914</LongitudeDegrees>
            </Position>
            <AltitudeMeters>172.16</AltitudeMeters>
            <DistanceMeters>127.23163095035439</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:22.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77296602725983</LatitudeDegrees>
              <LongitudeDegrees>19.422821640968323</LongitudeDegrees>
            </Position>
            <AltitudeMeters>163.72</AltitudeMeters>
            <DistanceMeters>132.87829450279526</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:23.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77296602725983</LatitudeDegrees>
              <LongitudeDegrees>19.422821640968323</LongitudeDegrees>
            </Position>
            <AltitudeMeters>175.88</AltitudeMeters>
            <DistanceMeters>132.87829450279526</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:24.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77287292480469</LatitudeDegrees>
              <LongitudeDegrees>19.422833681106567</LongitudeDegrees>
            </Position>
            <AltitudeMeters>190.23</AltitudeMeters>
            <DistanceMeters>143.26392441788008</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:25.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77285015583038</LatitudeDegrees>
              <LongitudeDegrees>19.42278742790222</LongitudeDegrees>
            </Position>
            <AltitudeMeters>207.79</AltitudeMeters>
            <DistanceMeters>147.33063191693523</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:26.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77284109592438</LatitudeDegrees>
              <LongitudeDegrees>19.42284119129181</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.42</AltitudeMeters>
            <DistanceMeters>151.16456610939085</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:27.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77289354801178</LatitudeDegrees>
              <LongitudeDegrees>19.422870635986328</LongitudeDegrees>
            </Position>
            <AltitudeMeters>192.69</AltitudeMeters>
            <DistanceMeters>157.3388313373599</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:28.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.772910356521606</LatitudeDegrees>
              <LongitudeDegrees>19.423003554344177</LongitudeDegrees>
            </Position>
            <AltitudeMeters>172.28</AltitudeMeters>
            <DistanceMeters>166.67334806974964</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:29.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.7727837562561</LatitudeDegrees>
              <LongitudeDegrees>19.422955632209778</LongitudeDegrees>
            </Position>
            <AltitudeMeters>185.98</AltitudeMeters>
            <DistanceMeters>181.13168114678817</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:30.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.772658824920654</LatitudeDegrees>
              <LongitudeDegrees>19.42305815219879</LongitudeDegrees>
            </Position>
            <AltitudeMeters>204.31</AltitudeMeters>
            <DistanceMeters>196.7117632863487</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:31.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.772632479667664</LatitudeDegrees>
              <LongitudeDegrees>19.42303705215454</LongitudeDegrees>
            </Position>
            <AltitudeMeters>217.98</AltitudeMeters>
            <DistanceMeters>199.98124129619805</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:32.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.772656321525574</LatitudeDegrees>
              <LongitudeDegrees>19.423114895820618</LongitudeDegrees>
            </Position>
            <AltitudeMeters>220.09</AltitudeMeters>
            <DistanceMeters>205.95752735655356</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:33.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77275037765503</LatitudeDegrees>
              <LongitudeDegrees>19.423035502433777</LongitudeDegrees>
            </Position>
            <AltitudeMeters>219.77</AltitudeMeters>
            <DistanceMeters>217.7568118944031</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:34.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77280390262604</LatitudeDegrees>
              <LongitudeDegrees>19.422990679740906</LongitudeDegrees>
            </Position>
            <AltitudeMeters>208.48</AltitudeMeters>
            <DistanceMeters>224.4601137386298</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:35.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77285540103912</LatitudeDegrees>
              <LongitudeDegrees>19.423009395599365</LongitudeDegrees>
            </Position>
            <AltitudeMeters>209.37</AltitudeMeters>
            <DistanceMeters>230.32949479470543</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:36.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77290201187134</LatitudeDegrees>
              <LongitudeDegrees>19.423025965690613</LongitudeDegrees>
            </Position>
            <AltitudeMeters>182.17</AltitudeMeters>
            <DistanceMeters>235.63630792558106</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:37.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.773011326789856</LatitudeDegrees>
              <LongitudeDegrees>19.423104405403137</LongitudeDegrees>
            </Position>
            <AltitudeMeters>201.68</AltitudeMeters>
            <DistanceMeters>248.93590155547102</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:38.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77298879623413</LatitudeDegrees>
              <LongitudeDegrees>19.422940731048584</LongitudeDegrees>
            </Position>
            <AltitudeMeters>186.4</AltitudeMeters>
            <DistanceMeters>260.47284157294735</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:39.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.772948026657104</LatitudeDegrees>
              <LongitudeDegrees>19.42304253578186</LongitudeDegrees>
            </Position>
            <AltitudeMeters>178.88</AltitudeMeters>
            <DistanceMeters>268.81653776498155</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:40.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.7729549407959</LatitudeDegrees>
              <LongitudeDegrees>19.422995686531067</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.24</AltitudeMeters>
            <DistanceMeters>272.1304271102443</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:41.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77300822734833</LatitudeDegrees>
              <LongitudeDegrees>19.423006296157837</LongitudeDegrees>
            </Position>
            <AltitudeMeters>212.58</AltitudeMeters>
            <DistanceMeters>278.10042992792665</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:43.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77284836769104</LatitudeDegrees>
              <LongitudeDegrees>19.422833919525146</LongitudeDegrees>
            </Position>
            <AltitudeMeters>221.9</AltitudeMeters>
            <DistanceMeters>299.4696108911087</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:44.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77293360233307</LatitudeDegrees>
              <LongitudeDegrees>19.42282772064209</LongitudeDegrees>
            </Position>
            <AltitudeMeters>186.69</AltitudeMeters>
            <DistanceMeters>308.9568777619635</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:46.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.773033142089844</LatitudeDegrees>
              <LongitudeDegrees>19.423261284828186</LongitudeDegrees>
            </Position>
            <AltitudeMeters>179.48</AltitudeMeters>
            <DistanceMeters>340.7754906618593</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:47.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.773056983947754</LatitudeDegrees>
              <LongitudeDegrees>19.423080444335938</LongitudeDegrees>
            </Position>
            <AltitudeMeters>168.04</AltitudeMeters>
            <DistanceMeters>353.4975282023301</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-18T20:38:48.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77294206619263</LatitudeDegrees>
              <LongitudeDegrees>19.422948360443115</LongitudeDegrees>
            </Position>
            <AltitudeMeters>193.75</AltitudeMeters>
            <DistanceMeters>369.1780076306614</DistanceMeters>
          </Trackpoint>
        </Track>
      </Lap>
    </Activity>
  </Activities>
</TrainingCenterDatabase>';
    }

}
