<?php namespace App\Services;

use JohnLui\AliyunOSS\AliyunOSS;

class OSS
{
    private $ossClient;
    private static $bucketName;

    public function __construct($isInternal = false)
    {
        $serverAddress = $isInternal ? config('alioss.ossServerInternal') : config('alioss.ossServer');
        $this->ossClient = AliyunOSS::boot($serverAddress, config('alioss.AccessKeyId'), config('alioss.AccessKeySecret'));
    }

    public static function upload($ossKey, $filePath)
    {
        $oss = new OSS(false); // 上传文件使用内网，免流量费
        $oss->ossClient->setBucket(config('alioss.BucketName'));
        $res = $oss->ossClient->uploadFile($ossKey, $filePath);
        return $res;
    }

    public static function uploadContent($osskey, $content)
    {
        $oss = new OSS(false); // 上传文件使用内网，免流量费
        $oss->ossClient->setBucket(config('alioss.BucketName'));
        $oss->ossClient->uploadContent($osskey, $content);
    }
    //删除
    public static function deleteObject($ossKey)
    {
        $oss = new OSS(false); // 上传文件使用内网，免流量费
        return $oss->ossClient->deleteObject(config('alioss.BucketName'), $ossKey);
    }
    //复制
    public function copyObject($sourceBuckt, $sourceKey, $destBucket, $destKey)
    {
        $oss = new OSS(true); // 上传文件使用内网，免流量费
        return $oss->ossClient->copyObject($sourceBuckt, $sourceKey, $destBucket, $destKey);
    }
    //移动
    public function moveObject($sourceBuckt, $sourceKey, $destBucket, $destKey)
    {
        $oss = new OSS(true); // 上传文件使用内网，免流量费
        return $oss->ossClient->moveObject($sourceBuckt, $sourceKey, $destBucket, $destKey);
    }

    public static function getUrl($ossKey)
    {
        $oss = new OSS();
        $oss->ossClient->setBucket(config('alioss.BucketName'));
        return $oss->ossClient->getUrl($ossKey, new \DateTime("+1 day"));
    }

    public static function createBucket($bucketName)
    {
        $oss = new OSS();
        return $oss->ossClient->createBucket($bucketName);
    }

    public static function getAllObjectKey($bucketName)
    {
        $oss = new OSS();
        return $oss->ossClient->getAllObjectKey($bucketName);
    }
    //获取指定object元信息
    public static function getObjectMeta($bucketName, $osskey)
    {
        $oss = new OSS();
        return $oss->ossClient->getObjectMeta($bucketName, $osskey);
    }
}
